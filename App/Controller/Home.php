<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 12/8/22
 * Time: 13:38
 */

namespace App\Controller;

class Home extends BaseController
{
	
	/**
	 * @throws \Twig\Error\SyntaxError
	 * @throws \Twig\Error\RuntimeError
	 * @throws \Twig\Error\LoaderError
	 */
	public function indexAction()
	{
		/*		$api = $this->api->get('https://www.itccompliance.co.uk/recruitment-webservice/api/list');
				$obj = json_decode($api);
				print_r("<pre>");
				print_r($obj->products->combgap);
				print_r("</pre>");
			
				die();*/
		
		/*	$allData = $this->itc->getall();
			
			print_r("<pre>");
			print_r($allData);
			print_r("</pre>");
			die();*/
		
		
		echo $this->templateEngine->render('pages/home/index.twig', ['title' => 'Home']);
	}
	
	/**
	 * @throws \Twig\Error\SyntaxError
	 * @throws \Twig\Error\RuntimeError
	 * @throws \Twig\Error\LoaderError
	 */
	public function aboutUsAction()
	{
		echo $this->templateEngine->render('pages/home/about.twig', ['title' => 'About Us']);
	}
}
