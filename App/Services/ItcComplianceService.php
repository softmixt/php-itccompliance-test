<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 14:39
 */

namespace App\Services;

use App\Lib\Api\ApiInterface;

class ItcComplianceService
{
	
	private string $serviceURL = 'https://www.itccompliance.co.uk/recruitment-webservice/api';
	
	/**
	 * @var \App\Lib\Api\ApiInterface
	 */
	private ApiInterface $api;
	
	public function __construct(ApiInterface $api)
	{
		$this->api = $api;
	}
	
	public function getAll()
	{
		$list = $this->api->get($this->serviceURL."/list");
		
		return $list;
	}
	
}