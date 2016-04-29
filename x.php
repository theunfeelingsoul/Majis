<?php
// work with get or post
$request = array_merge($_GET, $_POST);

// check that request is inbound message
if (!isset($request['to']) OR !isset($request['msisdn']) OR !isset($request['text'])) {
    error_log('not inbound message');
    return;
}

//Deal with concatenated messages
$message = false;
if (isset($request['concat']) AND $request['concat'] == true ) {
    //message can be reassembled using the part and total
    error_log("this message is part {$request['concat-part']} of {$request['concat-total']} for {$request['concat-ref']}");

    //generally this would be a database
    session_start();
    session_id($request['concat-ref']);

    if (!isset($_SESSION['messages'])) {
        $_SESSION['messages'] = array();
    }

    $_SESSION['messages'][] = $request;

    if (count($_SESSION['messages']) == $request['concat-total']) {
        error_log('received all parts of concatenated message');

        //order messages
        usort(
            $_SESSION['messages'], function ($a , $b) {
                return $a['concat-part'] > $b['concat-part'];
            }
        );

        $message = array_reduce(
            $_SESSION['messages'], function ($carry, $item) {
                return $carry . $item['text'];
            }
        );
    } else {
        error_log('have ' . count($_SESSION['messages']) . " of {$request['concat-total']} message");
    }
}

//Handle message types
switch ($request['type']) {
    case 'binary':
        error_log("got a binary message with a UDH: {$request['udh']}");
        break;

    case 'unicode':
        //Do some unicode stuff
        error_log("got a unicode message");
    default:
        error_log('message from: ' . $request['msisdn']);
        error_log("the message body is: {$request['text']}");
        if ($message) {
            error_log("the concatenated message is: {$message}");
        }
        break;
}