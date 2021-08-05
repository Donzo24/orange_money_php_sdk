<?php
namespace Donzo24\OrangeMoneySdk;

require('vendor/autoload.php');

use Donzo24\OrangeMoneySdk\{TokenRequest, HttpRequest};

class OrangeMoneySdk
{
	protected $http;
	protected $token;
	protected $merchant_key;
	protected $currency;
	protected $lang;
	protected $reference;

	protected $message;
	public $pay_token;
	public $payment_url;
	public $notif_token;

	
	function __construct($clientId, $clientSecret, $options)
	{
		$this->token = new TokenRequest($clientId, $clientSecret);

		$this->token = $this->token->getToken();

		$this->http = new HttpRequest("https://api.orange.com/orange-money-webpay/dev/v1/webpayment");

		$this->merchant_key = $options['merchant_key'];
		$this->currency = $options['currency'];
		$this->lang = $options['lang'];
		$this->reference = $options['reference'];
	}

	public function webPaymentTransactionInit($options = []){

		if(!$this->token) return false;

		$options = [
			"merchant_key" => $this->merchant_key,
			"currency" => $this->currency,
			"order_id" => $options['order_id'],
			"amount" => $options['amount'],
			"return_url" => $options['return_url'],
			"cancel_url" => $options['cancel_url'],
			"notif_url" => $options['notif_url'],
			"lang" => $this->lang,
			"reference" => $this->reference
		];

		$this->http->setHeaders([
			"Authorization" => "Bearer ".$this->token,
			'Content-Type' => 'application/json',
			'Accept' => 'application/json'
		])->setBody(
			json_encode($options)
		);

		$response = $this->http->post();

		if ($response->getStatusCode() != 201 OR empty($response->getBody())) return false;

		$body = json_decode($response->getBody(), true);

		if (!isset($body['message']) OR $body['message'] != "OK") return false;

		$this->message = $body['message'];
		$this->pay_token = $body['pay_token'];
		$this->payment_url = $body['payment_url'];
		$this->notif_token = $body['notif_token'];

		return true;
	}
}
?>