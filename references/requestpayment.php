<?php
require_once "AfricasTalkingGateway.php";
//Specify your credentials
$username = "sandbox";
$apiKey   = "************************************************************************";
//Create an instance of our awesome gateway class and pass your credentials
$gateway = new AfricasTalkingGateway($username, $apiKey,"sandbox");

//Write The Country Code
$countryCode = "+254";
//Phone Number 
$phoneNumber = $countryCode.$_GET["number"];
$productName  = "In-Game Item";
$currencyCode = "KES";
$amount       = 100;
$metadata = array("agentId"   => "456","productId" => "2617");

try {
  // Initiate the checkout. If successful, you will get back a transactionId
  $transactionId = $gateway->initiateMobilePaymentCheckout($productName, $phoneNumber, $currencyCode, $amount, $metadata);
  
  //We will now echo it so that we can get it in Unity and use it to confirm the status of the transaction
  echo $transactionId;
}
catch(AfricasTalkingGatewayException $e){
  echo "Received error response: ".$e->getMessage();
}
?>