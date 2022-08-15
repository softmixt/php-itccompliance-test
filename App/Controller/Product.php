<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 12/8/22
 * Time: 13:38
 */

namespace App\Controller;

use App\DTO\ProductsData;
use App\Helpers\DataSanitizer;
use Framework\Request;
use Framework\Response;

class Product extends BaseController
{
	
	/**
	 * @return void
	 * @throws \Twig\Error\LoaderError
	 * @throws \Twig\Error\RuntimeError
	 * @throws \Twig\Error\SyntaxError
	 */
	public function indexAction(): void
	{
		$all = $this->itc->getAllProducts();
		$productsFormatted = ProductsData::toMultipleArrayResponse($all);
		
		echo $this->templateEngine->render(
			'pages/product/index.twig',
			[
				'title'    => 'Products',
				'products' => DataSanitizer::dataCleaner($productsFormatted),
			]
		);
	}
	
	/**
	 * @param \Framework\Request  $req
	 * @param \Framework\Response $res
	 *
	 * @return void
	 * @throws \Twig\Error\LoaderError
	 * @throws \Twig\Error\RuntimeError
	 * @throws \Twig\Error\SyntaxError
	 */
	public function showAction(Request $req, Response $res): void
	{
		
		$id = $req->params[0];
		
		$product = $this->itc->getProductById($id);
		$productFormatted = ProductsData::toSingleArrayResponse($product);
		
		echo $this->templateEngine->render(
			'pages/product/show.twig',
			[
				'title'   => 'Product',
				'product' => DataSanitizer::dataCleaner($productFormatted),
			]
		);
	}
	
}
