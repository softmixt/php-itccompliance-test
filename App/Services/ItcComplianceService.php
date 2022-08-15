<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 14:39
 */

namespace App\Services;

use App\DTO\ProductsData;
use App\Lib\Api\ApiInterface;
use Error;

class ItcComplianceService implements ItcComplianceServiceInterface
{
	
	/**
	 * @var string
	 */
	private string $serviceURL = 'https://www.itccompliance.co.uk/recruitment-webservice/api';
	
	/**
	 * @var \App\Lib\Api\ApiInterface
	 */
	private ApiInterface $api;
	
	/**
	 * @param \App\Lib\Api\ApiInterface $api
	 */
	public function __construct(ApiInterface $api)
	{
		$this->api = $api;
	}
	
	/**
	 * @param string $uri
	 *
	 * @return array
	 */
	private function getData(string $uri): array
	{
		$result = [];
		
		try {
			$response = $this->api->get($this->serviceURL.$uri);
			$result = json_decode($response, true) ?? [];
		} catch (Error $e) {
			//TODO: Log error here in case of it ...
		}
		
		return $result;
	}
	
	/**
	 * @return array
	 */
	public function getAllProducts(): array
	{
		return $this->getData("/list");
	}
	
	/**
	 * @param string $id
	 *
	 * @return array
	 */
	public function getProductById(string $id): array
	{
		return $this->getData("/info?id=$id");
	}
}
