<?php

require_once 'AGateway.php';
/*
- protected $transactionUrl = 'http://testcURL.com'
- Concrete: method outputing the data return (string)
- Concrete: method posting the data return boolean.
- concrete: get friendly error message
- concrete: method process transaction return boolean
*/
class Gateway2 extends AGateway{

protected $transactionUrl='http://testcURL.com';

  protected $errorMsg;
  protected $schema=['Date'=>8,'Time'=>6,'AmtDollars'=>10,'AmtCents'=>2,'Currency'=>3,'CardNumber'=>16,'ExpiryDate'=>4,'Name'=>50];//characters

  public function outputData(string $output){

    return output;

  }


public function processTransaction(){

//null "Completed" if not error='Issue'
//$dataTransaction to singlelinetext

 $transactionDetails=$this-> dataTransaction;
 $amount=$transactionDetails['amount'];
 $date = date("Ymd");
 $time=date("His");
 $amountSplit=explode(".", $amount);
 $amtDollars=$amountSplit[0];
 $amtCents=$amountSplit[1];
 $expiryDate=$transactionDetails['expiry_date'];
 $expiryDateSplit=explode("/", $expiryDate);
 $expiryMonth=$expiryDateSplit[0];
 $expiryYear=substr($expiryDateSplit[1], -2);
 $expMonthYearJoin=$expiryMonth.$expiryYear;

 $data=['Date'=>$date,'Time'=>$time, 'AmtDollars'=>$amtDollars,'AmtCents'=>$amtCents,'Currency'=>$transactionDetails['currency'],'CardNumber'=>$transactionDetails['card_number'],'ExpiryDate'=>$expMonthYearJoin,'Name'=>$transactionDetails['cardholder_name']];
 echo "<br><br>";
 print_r($data);

 $singleLineData='';
 foreach ($data as $key => $value) {
   //print_r(strlen($data[$key]).':'.$this-> schema[$key]);echo "<br>";
   if(strlen($data[$key]) <= $this-> schema[$key]){
     $value=str_pad($value,  $this-> schema[$key], " ");
     $singleLineData=$singleLineData.$value;
   }

 }
 echo "<br><br>";
 print_r($singleLineData);

 $status= $this->postData($singleLineData);
 if($status==null || $status==true){
   $this->errorMsg="Transaction passed with Gateway 2";
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
