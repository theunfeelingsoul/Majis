<?php
$servername ="localhost";
$username="thevirgi_vic";
$password="4TokyoYahoo!J";
$dbname= "thevirgi_maji";
//create connection
global $conn;
 $conn=mysqli_connect($servername,$username, $password, $dbname); 

//check connection
if (!$conn){
    die("connection failed:" . mysqli_connect_error());
}


// work with get or post
$request = array_merge($_GET, $_POST);

// Check that this is a delivery receipt.
if (!isset($request['messageId']) OR !isset($request['status'])) {
    error_log('This is not a delivery receipt');
    return;
}

//Check if your message has been delivered correctly.
if ($request['status'] == 'delivered') {
    $m="Your message to {$request['msisdn']} (message id {$request['messageId']}) was delivered.";
    $c="The cost was {$request['price']}.";
    insert_delivery($m,$c);
} elseif ($request['status'] != 'accepted') {
    $m="Your message to {$request['msisdn']} (message id {$request['messageId']}) was accepted by the carrier.";
    $c="The cost was {$request['price']}.";
    insert_delivery($m,$c);
} else {
    $m="Your message to {$request['msisdn']} has a status of: {$request['status']}.";
    $c="Check err-code {$request['err-code']} against the documentation.";
    insert_delivery($m,$c);
}

function insert_delivery($m,$c){
	$sql="INSERT INTO delivery (message,cost)VALUES ('$m', '$c')";
    if (mysqli_query($conn, $sql)) {

      echo $status = "success";

    } else {
        $status = "fail";
       echo  $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
