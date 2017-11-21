<?php

require_once 'AGateway.php';
/*
- protected $transactionUrl = 'http://testcURL.com'
- Concrete: method outputing the data return (string)
- Concrete: method posting the data return boolean.
- concrete: get friendly error message
- concrete: method process transaction return boolean
*/
class Gateway1 extends AGateway{

protected $transactionUrl='http://testcURL.com';

  protected $errorMsg;

  public function outputData(string $output){

    return output;

  }

public function processTransaction(){

//null "Completed" if not error='Issue'
//$dataTransaction in xml string

  $date = date("Y-m-dH:i:s");
  $transactionDetails=$this-> dataTransaction;
  $expiryDate=$transactionDetails['expiry_date'];
  $expiryDateSplit=explode("/", $expiryDate);
  $expiryMonth=$expiryDateSplit[0];
  $expiryYear=$expiryDateSplit[1];

  $xmlString="<Transaction><Date>$date</Date><!—Thetransactiondate--><CreditCard><Number>".$transactionDetails['card_number']."</Number><ExpiryDate><Month>$expiryMonth</Month><Year>$expiryYear</Year></ExpiryDate></CreditCard><AmountCurrency=\"".$transactionDetails['currency']."\">".$transactionDetails['amount']."</Amount></Transaction>";

  echo "<br><br>";
  var_dump($xmlString);

  $status= $this->postData($xmlString);
  if($status == NULL || $status == true){
    $this->errorMsg="Transaction passed with Gateway 1";
  }
  else{
  $this->errorMsg="Error: On Transaction";
  }
  return (boolean)true;
}

public function getFriendlyErrorMessage(){

  return $this->errorMsg;

}

}
