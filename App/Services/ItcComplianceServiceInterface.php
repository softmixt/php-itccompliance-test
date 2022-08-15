<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 15/8/22
 * Time: 14:21
 */

namespace App\Services;

interface ItcComplianceServiceInterface
{
	
	/**
	 * @return array
	 */
	public function getAllProducts(): array;
	
	/**
	 * @param string $id
	 *
	 * @return array
	 */
	public function getProductById(string $id): array;
}