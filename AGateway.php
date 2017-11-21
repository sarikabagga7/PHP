<?php
require_once 'IGateway.php';

/*
- procted $dataTransaction = [ ];
- Concrete: method set data(array $data) return null
- Concrete method base postDataToPaymentProcessor: curl, or something for POSTing
*/

abstract class AGateway implements IGateway{

  protected $dataTransaction =[];

  public function setData(array $data){
    $this-> dataTransaction=$data;
  }

  public function postData($requestData){

  // Get cURL resource
  $curl = curl_init();
  // Set some options - we are passing in a useragent too here
  curl_setopt_array($curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $this->transactionUrl,
      CURLOPT_USERAGENT => 'Codular Sample cURL Request',
      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => $requestData
  ));
  // Send the request & save response to $resp
  $resp = curl_exec($curl);
  // Close request to clear up some resources
  curl_close($curl);

//print_r('Respocse curl-'.$resp);

return $resp;

}
}
