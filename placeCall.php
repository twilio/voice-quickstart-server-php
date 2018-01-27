<?php
/*
 * Makes a call to the specified client using the Twilio REST API.
 */
include('./vendor/autoload.php');
include('./config.php');

$callerId = 'client:quick_start';
$to = isset($_GET["to"]) ? $_GET["to"] : "identity";

$client = new Twilio\Rest\Client($API_KEY, $API_KEY_SECRET, $ACCOUNT_SID);

// Read TwiML at this URL when a call connects (hold music)
$call = $client->calls->create(
  'client:'.$to, // Call this number
  $callerId,     // From a valid Twilio number
  array(
      'url' => 'https://'.$_SERVER['HTTP_HOST'].'/incoming.php'
  )
);
