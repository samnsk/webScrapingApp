<?php
require_once __DIR__ . '/../Vendor/autoload.php';

class ProductsController extends AppController
{

	public $layout = '';

	public $uses = [
		'Product',
	];

	public function index()
	{
		$productList = $this->Product->find('all');
		$this->set('productList', $productList);
	}

}
