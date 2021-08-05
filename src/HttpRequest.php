<?php
namespace Donzo24\OrangeMoneySdk;

class HttpRequest
{
	protected $client;
	protected $headers;
	protected $body;
	protected $params;
	protected $url;
	
	function __construct($url)
	{
		$this->client = new \GuzzleHttp\Client();
		$this->url = $url;
	}

	public function setHeaders($headers = [])
	{
		$this->headers = $headers;
		return $this;
	}

	public function setParams($params = [])
	{
		$this->params = $params;
		return $this;
	}

	public function setBody($body = [])
	{
		$this->body = $body;
	}

	public function getHeaders()
	{
		return $this->headers;
		return $this;
	}

	public function getBody()
	{
		return $this->body;
	}

	public function get()
	{
		return $this->client->get($this->url);
	}

	public function post()
	{
		$options = [];

		if ($this->params) {
			return $this->client->post($this->url, [
				'form_params' => $this->params,
				'headers' => $this->headers
			]);
		}

		return $this->client->post($this->url, [
			'body' => $this->body,
			'headers' => $this->headers
		]);
	}
}


?>