<?php

/**
 * 商品を管理
 *
 * Class Product
 */
class Product extends AppModel
{

	/**
	 * 安い順で商品情報を取得
	 *
	 * @return array|int|null
	 */
	public function findOrderByPrice()
	{
		return $this->find('all', [
			'order' => [
				'price'
			]
		]);
	}

}
