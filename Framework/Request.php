<?php

/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 12/8/22
 * Time: 13:00
 */

namespace Framework;

class Request
{
	
	const POST             = 'POST';
	
	const GET              = 'GET';
	
	const APPLICATION_JSON = 'application/json';
	
	/**
	 * @var mixed|array
	 */
	public mixed $params;
	
	/**
	 * @var string
	 */
	public string $reqMethod;
	
	/**
	 * @var string
	 */
	public string $contentType;
	
	/**
	 * @param array $params
	 */
	public function __construct(array $params = [])
	{
		$this->params = $params;
		$this->reqMethod = trim($_SERVER['REQUEST_METHOD']);
		$this->contentType = !empty($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
	}
	
	/**
	 * @return array|string
	 */
	public function getBody(): array|string
	{
		if ($this->reqMethod !== self::POST) {
			return '';
		}
		
		$body = [];
		foreach ($_POST as $key => $value) {
			$body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
		}
		
		return $body;
	}
	
	/**
	 * @return array|mixed
	 */
	public function getJSON(): mixed
	{
		if ($this->reqMethod !== self::POST) {
			return [];
		}
		
		if (strcasecmp($this->contentType, self::APPLICATION_JSON) !== 0) {
			return [];
		}
		
		// Receive the RAW post data.
		$content = trim(file_get_contents("php://input"));
		
		return json_decode($content);
	}
}
