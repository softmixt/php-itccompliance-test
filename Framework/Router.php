<?php

/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 12/8/22
 * Time: 13:00
 */

namespace Framework;

class Router
{
	
	const NOT_FOUND_DEFAULT_ROUTER = '/404';
	
	/**
	 * @var array
	 */
	private static array $routes = [];
	
	/**
	 * @param $route
	 * @param $callback
	 *
	 * @return void
	 */
	public static function get($route, $callback): void
	{
		if (strcasecmp($_SERVER['REQUEST_METHOD'], Request::GET) !== 0) {
			return;
		}
		
		self::$routes[$route] = $callback;
	}
	
	/**
	 * @param $route
	 * @param $callback
	 *
	 * @return void
	 */
	public static function post($route, $callback): void
	{
		if (strcasecmp($_SERVER['REQUEST_METHOD'], Request::POST) !== 0) {
			return;
		}
		self::$routes[$route] = $callback;
	}
	
	/**
	 * @param $routeKey
	 * @param $routeCallback
	 * @param $requestUri
	 *
	 * @return array
	 */
	private static function buildRouter($routeKey, $routeCallback, $requestUri): array
	{
		$serverRequest = $requestUri;
		$serverRequest = (stripos($serverRequest, "/") !== 0) ? "/".$serverRequest : $serverRequest;
		$regex = str_replace('/', '\/', $routeKey);
		$isMatch = preg_match('/^'.($regex).'$/', $serverRequest, $matches, PREG_OFFSET_CAPTURE);
		
		if ($isMatch) {
			// first value is normally the route, lets remove it
			array_shift($matches);
			
			// Get the matches as parameters
			$params = array_map(function($param) {
				return $param[0];
			}, $matches);
			
			return [
				'callback' => $routeCallback,
				'route'    => $routeKey,
				'params'   => $params,
			];
		}
		
		return [];
	}
	
	/**
	 * @param $cb
	 * @param $prms
	 *
	 * @return bool
	 */
	private static function executeRouter($cb, $prms): bool
	{
		if (is_array($cb)) {
			$classInstance = new $cb[0]();
			$classAction = $cb[1];
			
			$classInstance->$classAction(new Request($prms), new Response());
			
			return true;
		}
		
		$cb(new Request($prms), new Response());
		
		return true;
	}
	
	/**
	 * @param $routerKey
	 *
	 * @return bool
	 */
	public static function run($routerKey = null): bool
	{
		$request = $routerKey ?? $_SERVER['REQUEST_URI'];
		$routeToExecute = null;
		foreach (self::$routes as $routeKey => $routeCallback) {
			$routeToExecute = self::buildRouter($routeKey, $routeCallback, $request);
			if (!empty($routeToExecute)) {
				break;
			}
		}
		
		// execute 404 ...
		if (!$routeToExecute) {
			self::run(self::NOT_FOUND_DEFAULT_ROUTER);
			
			return false;
		}
		
		return self::executeRouter($routeToExecute['callback'], $routeToExecute['params']);
	}
	
}
