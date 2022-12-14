<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 12/8/22
 * Time: 14:32
 */

namespace App\Controller;

use App\Lib\Api\ApiInterface;
use App\Lib\TemplateEngine\EngineRegisterInterface;
use App\Services\ItcComplianceServiceInterface;
use Framework\ServiceContainer;

class BaseController
{
	
	/**
	 * @var \Twig\Environment|mixed
	 */
	protected EngineRegisterInterface $templateEngine;
	
	/**
	 * @var \App\Lib\Api\ApiInterface|mixed
	 */
	protected ApiInterface $api;
	
	/**
	 * @var mixed
	 */
	protected ItcComplianceServiceInterface $itc;
	
	public function __construct()
	{
		$this->templateEngine = ServiceContainer::get('Engine');
		$this->api = ServiceContainer::get('ApiRequest');
		$this->itc = ServiceContainer::get('ItcComplianceService');
	}
}
