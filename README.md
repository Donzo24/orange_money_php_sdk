$om = new OrangeMoneySdk("aqikOGG7eLl1LcbF8mlhMf2D1wML08hS", "TuBBAhHYCHqV8zuG", [
	'merchant_key' => "fd271bc4",
	'currency' => "OUV",
	'lang' => 'fr',
	'reference' => "Bembeya"
]);

$response = $om->webPaymentTransactionInit([
	'order_id' => "72626272723", 
	'amount' => "20000", 
	'notif_url' => "http://bembeya.org", 
	'return_url' => "https://bembeya.org",
	'cancel_url' => "https://bembeya.org",
]);

if ($response) {
	echo $om->payment_url;
	echo $om->pay_token;
	echo $om->notif_token;
}

