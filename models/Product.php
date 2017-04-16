<?php

class Product
{
	/**
	 *	Makes a request to output all products from the database
	 */
	public static function get_all_products()
	{
		return 'all products';
	}

	/**
	 *	Makes a request to output product by id from the database
	 */
	public static function get_product_by_id($id)
	{
		return 'product by id';
	}

}