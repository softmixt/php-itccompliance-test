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
