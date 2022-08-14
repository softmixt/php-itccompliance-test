<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 12/8/22
 * Time: 13:02
 */


namespace Framework;

class Framework
{
	
	/**
	 * @return void
	 */
	public static function run(): void
	{
		// Add more framework initialization processes here ...
		Router::run();
	}
}