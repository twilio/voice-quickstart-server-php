<?php
/*
 * Makes a call to the specified client using the Twilio REST API.
 */
include('./vendor/autoload.php');
include('./config.php');

$identity = 'alice';
$callerNumber = '1234567890';
$callerId = 'client:quick_start';
$to = isset($_GET["to"]) ? $_GET["to"] : NULL;

$client = new Twilio\Rest\Client($API_KEY, $API_KEY_SECRET, $ACCOUNT_SID);

$call = NULL;
if (!isset($to) || empty($to)) {
  $call = $client->calls->create(
    'client:alice', // Call this number
    $callerId,      // From a valid Twilio number
    array(
      'url' => 'https://'.$_SERVER['HTTP_HOST'].'/incoming.php'
    )
  );
} else if (is_numeric(str_replace('', '+', $to))) {
  $call = $client->calls->create(
    $to,           // Call this number
    $callerNumber, // From a valid Twilio number
    array(
      'url' => 'https://'.$_SERVER['HTTP_HOST'].'/incoming.php'
    )
  );
} else {
  $call = $client->calls->create(
    'client:'.$to, // Call this number
    $callerId,     // From a valid Twilio number
    array(
      'url' => 'https://'.$_SERVER['HTTP_HOST'].'/incoming.php'
    )
  );
}

print $call.sid;
