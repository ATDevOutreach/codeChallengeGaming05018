<?php
require_once("AfricasTalkingGateway.php");

$number;

$getNumber = $_GET["number"];

$username = "sandbox";
$apiKey   = "************************************************************************";

$at = new AfricasTalkingGateway($username,$apikey,"sandbox");

$message = "Sample Message : Hello World!!!";
$recipient = $getNumber;

try
{
//SMS API
$results = $at->sendMessage($recipient, $message);

foreach($results as $result) {

    /*// status is either "Success" or "error message"
    echo " Number: " .$result->number."\n";
    echo " Status: " .$result->status."\n";
    echo " MessageId: " .$result->messageId."\n";
    echo " Cost: "   .$result->cost."\n";*/

    if($result->status==="Success")
    echo "Success"; //Echos back into our Unity3D www object
    else
    echo "Unsuccessful";
  }

}
catch(AfricasTalkingGatewayExceptions $e)
{
echo "Encountered An Error".$e->getMessage();
}
?>