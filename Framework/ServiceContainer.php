<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 13:03
 */

namespace Framework;

use Error;

class ServiceContainer
{
	
	/**
	 * @var array
	 */
	private static array $services = [];
	
	/**
	 * @param string $serviceName
	 * @param        $service
	 *
	 * @return void
	 */
	public static function set(string $serviceName, $service): void
	{
		if (!isset(self::$services[$serviceName])) {
			self::$services[$serviceName] = $service;
		}
	}
	
	/**
	 * @param callable $service
	 *
	 * @return void
	 */
	public static function bind(callable $service): void
	{
		$service(
			[
				__CLASS__,
				'set',
			],
			[
				__CLASS__,
				'get',
			]
		);
	}
	
	/**
	 * @param string $serviceName
	 *
	 * @return mixed
	 */
	public static function get(string $serviceName): mixed
	{
		if (!isset(self::$services[$serviceName])) {
			throw new Error("Requested service $serviceName is not registered");
		}
		
		return self::$services[$serviceName];
	}
}
