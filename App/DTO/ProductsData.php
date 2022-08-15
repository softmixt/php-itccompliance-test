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
	
}
