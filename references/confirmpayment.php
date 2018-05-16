<?php
$id = $_GET["id"];

$server = "localhost";
$username ="root";
$serverpassword = "";
$dbname = "PointClickGame";

$connect = mysqli_connect($server,$username,$serverpassword,$dbname);

$sqlSelect = mysqli_query($connect,"SELECT status FROM transactions WHERE Transaction_ID='$id'");

    //Because we are sure it's going to be only one item retrieved we can break
    while($row=mysqli_fetch_array($sqlSelect))
    {
        if($row[0]=="Success")
        {
            echo "Success";
            break;
        }
        else
        {
            echo "Failure";
            break;
        }
    }
?>