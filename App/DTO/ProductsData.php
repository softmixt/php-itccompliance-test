<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 15/8/22
 * Time: 14:37
 */

namespace App\DTO;


class ProductsData
{
	
	/**
	 * @param $data
	 *
	 * @return array
	 */
	public static function toMultipleArrayResponse($data): array
	{
		
		$newProductsFormatted = ['data' => []];
		if (isset($data['error'])) {
			return $data;
		}
		
		if (!isset($data['products']) && empty($data)) {
			return $newProductsFormatted;
		}
		
		
		foreach ($data['products'] as $id => $name) {
			$newProductsFormatted['data'][] = [
				'id'   => $id,
				'name' => $name,
			];
		}
		
		return $newProductsFormatted;
	}
	
	/**
	 * @param $data
	 *
	 * @return array
	 */
	public static function toSingleArrayResponse($data): array
	{
		
		$newProductsFormatted = ['data' => []];
		if (isset($data['error'])) {
			return $data;
		}
		
		if (empty($data)) {
			return $newProductsFormatted;
		}
		
		$newProductsFormatted['data'] = array_values($data)[0] ?? [];
		
		return $newProductsFormatted;
	}
	
	private function cleanUpData ($input, $flags = ENT_COMPAT | ENT_HTML401, $encoding = 'UTF-8', $double_encode = false) {
		static $flags, $encoding, $double_encode;
		if (is_array($input)) {
			return array_map('htmlspecialchars_recursive', $input);
		}
		else if (is_scalar($input)) {
			return htmlspecialchars($input, $flags, $encoding, $double_encode);
		}
		else {
			return $input;
		}
	}
	
}