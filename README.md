$om = new OrangeMoneySdk("twywyywywyywyyw", "gsgssjsjjsjsj", [
	'merchant_key' => "",
	'currency' => "OUV",
	'lang' => 'fr',
	'reference' => "Compagny Name"
]);

$response = $om->webPaymentTransactionInit([
	'order_id' => "72626272723", 
	'amount' => "20000", 
	'notif_url' => "", 
	'return_url' => "",
	'cancel_url' => "",
]);

if ($response) {
	echo $om->payment_url;
	echo $om->pay_token;
	echo $om->notif_token;
}

