<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 13:57
 */

use App\Lib\Api\Api;
use App\Lib\TemplateEngine\Engine;
use App\Services\ItcComplianceService;
use Framework\ServiceContainer;

// Register Twig lib
ServiceContainer::bind(function($set) {
	$templateEngine = new Engine([
		'templatesPath' => SITE_ROOT.'/App/Templates',
		'cache'         => IS_DEV ? false : SITE_ROOT.'/Storage/Cache',
	]);
	
	$set('Engine', $templateEngine->load());
});

//  Register Api lib
ServiceContainer::bind(function($set) {
	$apiLib = new Api();
	$set('ApiRequest', $apiLib);
});

//  Register Itc Compliance service
ServiceContainer::bind(function($set, $get) {
	$apiServiceProvider = $get('ApiRequest');
	$itcComplianceService = new ItcComplianceService($apiServiceProvider);
	$set('ItcComplianceService', $itcComplianceService);
});

