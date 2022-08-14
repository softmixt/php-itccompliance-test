<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 14:17
 */

namespace App\Lib\TemplateEngine\Engines;

use App\Lib\TemplateEngine\EngineRegisterInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigLibEngine implements EngineRegisterInterface
{
	
	/**
	 * @var \Twig\Environment
	 */
	private Environment $twig;
	
	/**
	 * @param array $settings
	 */
	public function __construct(array $settings)
	{
		$loader = new FilesystemLoader($settings['templatesPath']);
		$this->twig = new Environment($loader, ['cache' => $settings['cache'],]);
	}
	
	/**
	 * @throws \Twig\Error\RuntimeError
	 * @throws \Twig\Error\SyntaxError
	 * @throws \Twig\Error\LoaderError
	 */
	public function render($name, array $context = []): string
	{
		return $this->twig->render($name, $context);
	}
}