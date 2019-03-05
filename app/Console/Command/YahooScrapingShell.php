<?php

/**
 * Yahooから商品情報を取得するクラス
 *
 * Class TestScrapingShell
 */
class YahooScrapingShell extends AppShell
{

	public $uses = [
		'Product'
	];

	/**
	 * YahooからJOYの商品情報を取得します
	 * @throws Exception
	 */
	public function main()
	{
		$this->log('---------------------------------------------------------------', CRON_LOG);
		$this->log('Yahooの集計を始めます', CRON_LOG);
		$html = file_get_contents(YAHOO_JOY);
		$doc = phpQuery::newDocument($html);
		try {
			foreach ($doc->find('.elItemWrapper')as $item) {
				// 取得済みの商品は保存しない
				$productCode = pq($item)->find('.elItem')->find('.elOthers')->find('.elInner')->find('.elTexts')->find('p')->attr('data-item-code');
				if ($this->__existsProductCode($productCode)) {
					continue;
				}

				$productName = pq($item)->find('.elItem')->find('.elWrap')->find('.elName')->find('a')->text();
				if (strpos($productName, JOY) === false) {
					continue;
				}

				$productImageUrl = pq($item)->find('.elItem')->find('.elWrap')->find('.elImage')->find('a')->find('img')->eq(0)->attr('src');
				if ($productImageUrl === 'https://s.yimg.jp/i/space.gif') {
					$productImageUrl = pq($item)->find('.elItem')->find('.elWrap')->find('.elImage')->find('a')->find('img')->attr('data-original');
				}
				$productUrl = pq($item)->find('.elItem')->find('.elWrap')->find('.elName')->find('a')->attr('href');
				$productPrice = str_replace(',', '', pq($item)->find('.elItem')->find('.elPrice')->find('p')->find('span')->eq(0)->text());

				$product = [
					'Product' => [
						'name' => $productName,
						'code' => $productCode,
						'image_url' => $productImageUrl,
						'big_category' => DAILY_USE_ITEM,
						'url' => $productUrl,
						'description' => null,
						'price' => $productPrice
					],
				];

				$this->Product->create();
				$this->Product->save($product);
				$this->log(' YAHOO: 商品コード'.$productCode.'の商品を登録しました', CRON_LOG);
			}
		} catch (Exception $e) {
			$this->log('Yahooの集計中にエラーが発生しました[エラー内容:'.$e->getMessage().']', CRON_LOG);
			throw $e;
		}
		$this->log('Yahooの集計を終了します', CRON_LOG);
		$this->log('---------------------------------------------------------------', CRON_LOG);
	}

	/**
	 * 同一の商品コードがDBに存在するかチェック
	 *
	 * @param string $productCode
	 * @return bool 商品コードがDBに存在する場合は true
	 */
	private function __existsProductCode($productCode)
	{
		$productCodeList = $this->Product->find('all', [
			'fields' => 'code'
		]);
		$productCodeList = Hash::extract($productCodeList, '{n}.Product.code');

		return in_array($productCode, $productCodeList);
	}

}
