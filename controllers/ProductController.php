<?php

include_once ROOT . '/models/Product.php';

class ProductController
{
	/**
	 *	Get all products
	 */
	public function index()
	{
		$products_list = array();
		$products_list = Product::get_all_products();

		require_once(ROOT . '/views/product/index.php');
		return true;
	}

	/**
	 *	Get product
	 */
	public function show($id)
	{
		if ($id) {
			$product = Product::get_product_by_id($id);
		}

		require_once(ROOT . '/views/product/show.php');
		return true;
	}
}