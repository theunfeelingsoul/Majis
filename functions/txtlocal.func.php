<?php 

/**
 * retrieves sms' from txtlocal server.
 * @return mixed
 * below is how the data is formatted
	 {
		"inbox_id":123456,
		"num_messages":2,
		"min_time":1357209840,
		"max_time":1372844640,
		"sort_order":"asc",
		"sort_field":"date",
		"start":0,
		"limit":1000,
		"messages":[{
			"number":447123456789,
			"message":"Hi, could you please give me a call back?",
			"date":"2013-07-03 12:32:41",
			"isNew":true,
			"status":"D"
		},
		{
			"number":447987654321,
			"message":"Thanks for your message",
			"date":"2013-07-02 14:53:18",
			"isNew":NULL,
			"status":"D"
		}],
		"status":"success"
	}
 */
function get_messages(){
	// Textlocal account details
	$username 	= 'victorstine@yahoo.com';
	$hash 		= 'Appleseed4'; //password

	// Inbox id
	$inbox_id = '9';
 
	// Prepare data for POST request
	$data = array('username' => $username, 'hash' => $hash, 'inbox_id' => $inbox_id);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.txtlocal.com/get_messages/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch); // JASON
	curl_close($ch);
	
	// convert JASON to array
	$obj = json_decode($response,true);

	return $obj;
}


/**
 * Gets the last record's array pstion field in txtlocal table.
 * @param integer $id
 * @return mixed
 */
function get_last(){
	global $conn;
	// get the array position from db
	$sql="SELECT array_pos FROM txtlocal ORDER BY id DESC LIMIT 1";

	$result = mysqli_query($conn,$sql) or die(mysqli_error());

	
	while ($row = mysqli_fetch_assoc($result)) {  
    	return $ap=(int)$row['array_pos'];
	}

	if ($ap) {
		return $ap;
	}else{
		return -1;
	}


	
}

function insert_messages($key,$inbox_id, $m, $d){
	global $conn;
	$msg_array = explode_message($m);

	// echo "<pre>";
	// print_r($msg_array);
	// echo "</pre>";

	// get facility name
	// get com name
	$faci = get_by_faci_num(trim($msg_array['faci_num']));
	echo "<pre>";
	print_r($faci);
	echo "</pre>";
	
	
	$faci_name = $faci['faci_name'];
	$faci_num = $faci['faci_num'];
	$problems = $msg_array['faci_prob'];
	$com_name = $faci['com_name'];


	$sql1 = "INSERT INTO faci_problems (faci_name, faci_num, problems, com_name) 
				VALUES('$faci_name','$faci_num', '$problems', '$com_name')";
	$result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));



	$sql = "INSERT INTO txtlocal (array_pos,inbox_id, msg, date_rec) 
				VALUES('$key','$inbox_id', '$m', '$d')";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
}

function get_by_faci_num($faci_num){
	global $conn;
	$sql="SELECT * FROM faci WHERE faci_num = '$faci_num'";
	$result = mysqli_query($conn,$sql) or die (mysqli_error());
	$data=false;
	while ($row = mysqli_fetch_assoc($result)) {

		$data = array(
						'faci_name' 	=> $row['faci_name'], 
						'faci_num' 		=> $row['faci_num'], 
						'com_name' 		=> $row['com_name'], 
						'id' 			=> $row['id'], 
					);

	}

	return $data;
}



function explode_message($msg){
	// explode the message by colon

	// if (!preg_match('/fn/',$msg)) {
	//    echo $msg;
	//    echo "<br>";
	//    $msg = "fn 0505052008173WP07 : Problem Pump Beakdwon";

	// }

	$msg = explode(':', $msg);

	// split the exploded msg by the key words
	// $faci_num 	= preg_split('/fn/', $msg[0]);
	// array_shift($faci_num);
	

	// $faci_prob 	= preg_split('/Problem/', $msg[1]);
	// array_shift($faci_prob);

	$msg_array = array(
		'faci_num' =>$msg[0] , 
		'faci_prob' =>$msg[1] , 
		);


	return $msg_array;
}



 ?>