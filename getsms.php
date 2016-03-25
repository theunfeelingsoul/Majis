<?php


include "database.php";
include "functions/txtlocal.func.php";


// retrieve messages from txtlocal server
$obj = get_messages();

$inbox_id 	= (int)$obj['inbox_id'];
echo $num_msg 	= $obj['num_messages'];
echo "<br>";

// last record's array postion field
echo $last = get_last();
$ap = (int)$last;

// compare the arraypos to newt_textbox_set_height(textbox, height) array posotion
if ($ap<$num_msg) {
	// insert from that array pos
	foreach ($obj['messages'] as $key => $value) {
		if ($key>$ap) {
			insert_messages($key,$inbox_id, $value['message'], $value['date']);
		}
		
	}
}

?>
