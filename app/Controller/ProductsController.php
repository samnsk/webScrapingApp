<?php
require_once __DIR__ . '/../Vendor/autoload.php';

/**
 * Class ProductsController
 */
class ProductsController extends AppController
{

	public $layout = '';

	public $uses = [
		'Product'
	];

	public $components = [
		'Paginator',
	];

	public $paginate = [
		'order' => [
			'Product.price' => 'asc'
		],
		'limit' => 12,
		'maxLimit' => 12,
	];

	public function index()
	{
		$this->Paginator->settings = $this->paginate;
		$this->set('productList',$this->paginate('Product'));
	}

}
