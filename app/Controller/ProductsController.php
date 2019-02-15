<?php
require_once __DIR__ . '/../Vendor/autoload.php';

/**
 * Class ProductsController
 */
class ProductsController extends AppController
{

	public $layout = '';

	public $uses = [
		'Product',
	];

	public function index()
	{
		$productList = $this->Product->findOrderByPrice();
		$this->set('productList', $productList);
	}

}
