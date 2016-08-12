<?php

if ($_POST['b']) {
	
	$r = $_POST['r']; //recipents all in a string seperated by commas
	$m = $_POST['m']; // message

	$rs=explode(',', $r); // explode by comma

	insert_message($r,'447559600526',$m);

	// loop through each number and send an sms
	foreach ($rs as $key => $value) {
		echo "<br>";
		echo $value;
		$resp = sendsms($value,$m);
		$add .= $resp.',';

	}

	// redirct to sent sms
	header("location:sentsms.php?r=$add");
	exit();
}

function sendsms($to,$m){
	
	$url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
	    [
	      'api_key' =>  '168bf1ea',
	      'api_secret' => 'cd45eeba05679077',
	      'to' => $to,
	      'from' => '447559600526',
	      'text' => $m,
	    ]
	);

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);

	// echo $response;

	//Decode the json object you retrieved when you ran the request.
	  $decoded_response = json_decode($response, true);

	  error_log('You sent ' . $decoded_response['message-count'] . ' messages.');

	  foreach ( $decoded_response['messages'] as $message ) {
	      if ($message['status'] == 0) {
	          return "Success " . $message['message-id'];
	      } else {
	          return "Error {$message['status']} {$message['error-text']}";
	      }
	  }
} // end

function insert_message($to_who,$from_who,$message){
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
	echo "in";
	$date = time();
	$sql="INSERT INTO sentsms (to_who,from_who,message,date_sent)
	VALUES ('$to_who', '$from_who', '$message','$date')";

	$result1 = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	echo "<br>";
	echo "out";
    
}

