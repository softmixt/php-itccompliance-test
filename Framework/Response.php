<?php

/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 12/8/22
 * Time: 13:01
 */

namespace Framework;

class Response
{
	
	/**
	 * @var int
	 */
	private int $status = 200;
	
	/**
	 * @param int $code
	 *
	 * @return $this
	 */
	public function status(int $code): static
	{
		$this->status = $code;
		
		return $this;
	}
	
	/**
	 * @param array $data
	 *
	 * @return void
	 */
	public function toJSON(array $data = []): void
	{
		http_response_code($this->status);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	
	/**
	 * @param string $html
	 *
	 * @return void
	 */
	/*	public function toHTML(string $html): void
		{
			http_response_code($this->status);
			header('Content-Type: text/html');
			echo $html;
		}*/
	
}
