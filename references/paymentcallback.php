<?php
$data  = json_decode(file_get_contents('php://input'), true);
print_r($data);

$category = $data["category"];
echo $category;
// Process the data...
$category = $data["category"];
if ( $category == "MobileC2B" ) {
   //....some logic...
} else if ( $category == "MobileB2C" ) {
    //.... some more logic ...
} else if ( $category == "MobileCheckout" ) {
    //.... some more logic ...
    //Most Probable Option

    $server = "localhost";
    $username ="root";
    $serverpassword = "";
    $dbname = "database";

    $connect = mysqli_connect($server,$username,$serverpassword,$dbname);

    //Usual Parameters to be inserted into the database
    $transactionId = $data["transactionId"];
    $category = $data["category"];
    $provider = $data["provider"];
    $refId = $data["providerRefId"];
    $channelCode = $data["providerChannelCode"];
    $productName = $data["productName"];
    $sourceType = $data["sourceType"];
    $source = $data["source"];
    $destType = $data["destinationType"];
    $destination = $data["destination"];
    $value = $data["value"];
    $transactionFee = $data["transactionFee"];
    $providerFee = $data["providerFee"];
    $status=$data["status"];
    $desc = $data["description"];
    $requestMetaData = $data["requestMetadata"];
    $providerMetaData = $data["providerMetadata"];
    $transactionDate = $data["transactionDate"];

    //Insert into the database
    $sql = "INSERT INTO transactions_table (Transaction_ID,category,provider,providerRefId,providerChannelCode,productName,sourceType,source,destinationType,destination,value,transactionFee,providerFee,status,description,requestMetaData,providerMetaData,transactionDate) 
    VALUES('$transactionId','$category','$provider','$refId','$channelCode','$productName',
    '$sourceType','$source','$destType','$destination','$value','$transactionFee','$providerFee','$status','$desc',
    '$requestMetaData','$providerMetaData','$transactionDate')";

    $query = mysqli_query($connect,$sql);
    //After insertion is complete, we can use the info from the DB to know if the transaction is successful or not and
    //act accordingly
  
} else {
    //.... some more logic ...
}
?>