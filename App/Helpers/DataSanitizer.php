<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 15/8/22
 * Time: 16:02
 */

namespace App\Helpers;

class DataSanitizer
{
	
	/**
	 * @param $input
	 *
	 * @return array|mixed|string
	 */
	public static function dataCleaner($input): mixed
	{
		if (is_array($input)) {
			return array_map(
				[
					__CLASS__,
					'dataCleaner',
				],
				$input
			);
		} else {
			if (is_scalar($input)) {
				return trim(
					preg_replace(
						'/ +/',
						' ',
						preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($input))))
					)
				);
			} else {
				return $input;
			}
		}
	}
}