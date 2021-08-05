<?php
namespace Donzo24\OrangeMoneySdk;

use Donzo24\OrangeMoneySdk\HttpRequest;

class TokenRequest
{
	protected $http;
	
	function __construct($clientId, $clientSecret)
	{
		$this->http = new HttpRequest("https://api.orange.com/oauth/v3/token");

		$this->http->setHeaders([
			"Authorization" => "Basic ".base64_encode("{$clientId}:{$clientSecret}"),
		])->setParams([
			"grant_type" => "client_credentials"
		]);

		return $this;
	}

	public function getToken()
	{
		$response = $this->http->post();

		if ($response->getStatusCode() != 200 OR empty($response->getBody())) return false;

		$body = json_decode($response->getBody(), true);

		if (!isset($body['access_token'])) return false;

		return $body['access_token'];

	}
}
?>