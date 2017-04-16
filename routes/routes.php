<?php

return array(
	// products - ProductsController, show - method in this controller, $1 - param
	'products/([0-9]+)' => 'product/show/$1',
	'products' => 'product/index',
);