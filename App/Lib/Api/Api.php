<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 14:40
 */

namespace App\Lib\Api;


class Api implements ApiInterface
{
	
	/**
	 * @param $url
	 *
	 * @return bool|string
	 */
	public function get($url): bool|string
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
		
		return $data;
	}
	
	/**
	 * @param $url
	 *
	 * @return bool|string
	 */
	public function post($url): bool|string
	{
		// TODO: Implement post() method.
	}
}