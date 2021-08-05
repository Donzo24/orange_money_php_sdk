# Orange money PHP SDK

Orange money PHP SDK is a php package to implement orange money payment in an application

## Installation

Use the package composer to install.

```bash
composer require youssouf/orange_money_php_sdk
```

## Usage

```php
import foobar

# returns 'object'
$om = new OrangeMoneySdk("twywyywywyywyyw", "gsgssjsjjsjsj", [
	'merchant_key' => "key",
	'currency' => "OUV",
	'lang' => 'fr',
	'reference' => "Compagny Name"
]);

# returns 'bool'
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
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)