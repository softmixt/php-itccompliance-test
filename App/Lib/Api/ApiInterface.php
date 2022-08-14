<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 15:00
 */

namespace App\Lib\Api;

interface ApiInterface
{
	
	/**
	 * @param $url
	 *
	 * @return bool|string
	 */
	public function get($url): bool|string;
	
	/**
	 * @param $url
	 *
	 * @return bool|string
	 */
	public function post($url): bool|string;
}