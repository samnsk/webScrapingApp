<?php

/**
 * Amazonから商品情報を取得するクラス
 *
 * Class AmazonScrapingShell
 */
class AmazonScrapingShell extends AppShell
{

	public $uses = [
		'Product'
	];

	/**
	 * AmazonからJOYの商品情報を取得します
	 * @throws Exception
	 */
	public function main()
	{
		$this->log('---------------------------------------------------------------', CRON_LOG);
		$this->log('AMAZONの集計を始めます', CRON_LOG);
		$html = file_get_contents(AMAZON_JOY);
		$doc = phpQuery::newDocument($html);
		try {
			foreach ($doc->find('.s-result-item') as $item) {
				$smallCategory = pq($item)->find('.s-item-container')->find('.a-spacing-mini')->find('.a-spacing-none')->eq(1)->text();
				if ($smallCategory !== 'ジョイ') {
					continue;
				}
				// 取得済みの商品は保存しない
				$productCode = pq($item)->attr('data-asin');
				if ($this->__productCodeExist($productCode)) {
					continue;
				}
				$this->log(' AMAZON: 商品コード'.$productCode.'の商品を登録しました', CRON_LOG);

				$productName = pq($item)->find('h2')->text();
				$productImageUrl = pq($item)->find('.a-column')->find('img')->attr('src');
				$productUrl = pq($item)->find('.s-item-container')->find('.a-spacing-mini')->find('.a-spacing-none')->find('.a-link-normal')->attr('href');
				$productPrice = pq($item)->find('.s-item-container')->find('.a-color-price')->text();
				$productPrice = trim(str_replace(['￥', ','], '', $productPrice));

				$product = [
					'Product' => [
						'name' => $productName,
						'code' => $productCode,
						'image_url' => $productImageUrl,
						'big_category' => DAILY_USE_ITEM,
						'small_category' => $smallCategory,
						'url' => $productUrl,
						'description' => null,
						'price' => $productPrice
					],
				];

				$this->Product->create();
				$this->Product->save($product);
			}
		} catch (Exception $e) {
			$this->log('AMAZONの集計中にエラーが発生しました[エラー内容:'.$e->getMessage().']', CRON_LOG);
			throw $e;
		}
		$this->log('AMAZONの集計を終了します', CRON_LOG);
		$this->log('---------------------------------------------------------------', CRON_LOG);
	}

	/**
	 * 同一の商品コードがDBに存在するかチェック
	 *
	 * @param $productCode
	 * @return bool 商品コードがDBに存在する場合は true
	 */
	private function __productCodeExist($productCode)
	{
		$productCodeList = $this->Product->find('all', [
			'fields' => 'code'
		]);
		$productCodeList = Hash::extract($productCodeList, '{n}.Product.code');

		return in_array($productCode, $productCodeList, true);
	}

}
