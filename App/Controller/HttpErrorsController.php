<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 15:51
 */

namespace App\Controller;

class HttpErrorsController extends BaseController
{
	
	/**
	 * @throws \Twig\Error\SyntaxError
	 * @throws \Twig\Error\RuntimeError
	 * @throws \Twig\Error\LoaderError
	 */
	public function error404Action()
	{
		echo $this->templateEngine->render('pages/errors/error404.twig', ['title' => '404 Page Not Found!']);
	}
	
}