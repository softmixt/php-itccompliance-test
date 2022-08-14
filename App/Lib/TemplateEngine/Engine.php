<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 15:23
 */

namespace App\Lib\TemplateEngine;

use App\Lib\TemplateEngine\Engines\TwigLibEngine;

class Engine
{
	
	private EngineRegisterInterface $engine;
	
	public function __construct(array $settings = [])
	{
		
		// Here we register our Twig engine ...
		$this->engine = new TwigLibEngine(
			[
				'templatesPath' => $settings['templatesPath'],
				'cache'         => $settings['cache'],
			]
		);
		
	}
	
	/**
	 * @return \App\Lib\TemplateEngine\EngineRegisterInterface
	 */
	public function load(): EngineRegisterInterface
	{
		return $this->engine;
	}
}