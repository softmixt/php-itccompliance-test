<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 14/8/22
 * Time: 15:07
 */

namespace App\Lib\TemplateEngine;

interface EngineRegisterInterface
{
	
	/**
	 * @param       $name
	 * @param array $context
	 *
	 * @return mixed
	 */
	public function render($name, array $context = []): string;
}
