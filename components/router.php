<?php

class Router 
{
	private $routes;

	/**
	 *	Connect file with routes
	 */
	public function __construct()
	{
		$routes_path = ROOT. '/routes/routes.php';
		$this->routes = include($routes_path);
	}

	/**
	 *	Returns string request
	 */
	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	/**
	 *	Runs the handler query string
	 */
	public function run()
	{	
		$uri = $this->getURI();

		// For compare the query string with routes
		foreach ($this->routes as $uri_pattern => $path) {

			if (preg_match("~$uri_pattern~", $uri)) {
				$query_string = preg_replace("~$uri_pattern~", $path, $uri);

				$handlers = explode('/', $query_string);

				$controller_name = ucfirst(array_shift($handlers) . 'Controller');
				$method_name = ucfirst(array_shift($handlers));

				$params = $handlers;

				$controller_file = ROOT . '/controllers/' . $controller_name . '.php';

				if (file_exists($controller_file)) {
					include_once($controller_file);
				}

				$controller_object = new $controller_name;

				// For pass to the method values which are represented as variables
				$result = call_user_func_array(
					array(
						$controller_object, 
						$method_name
					), 

					$params
				);

				if ($result != null) {
					break;
				}
			}
		}
	}
}