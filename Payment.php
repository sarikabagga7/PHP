<?php
require_once  'Gateway1.php';
require_once  'Gateway2.php';

$transactionDetails = array(
	'card_number' => '4111111111111111',
	'card_type' => 'VISA',
	'cardholder_name' => 'John Doe',
	'expiry_date' => '07/2009',
	'amount' => '12.25',
	'currency' => 'USD',
);


print_r($transactionDetails);
$gateway1 = new Gateway1();
$gateway1->setData($transactionDetails);

$result = $gateway1->processTransaction();

if($result){
    echo '<h3>' . $gateway1->getFriendlyErrorMessage() . '</h3>';
}
else{
echo 'Issue';
}

$gateway2 = new Gateway2();
$gateway2->setData($transactionDetails);

$result = $gateway2->processTransaction();

if($result){
    echo '<h3>' . $gateway2->getFriendlyErrorMessage() . '</h3>';
}
else{
echo 'Issue';
}
