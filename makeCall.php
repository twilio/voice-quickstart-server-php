<?php
/*
 * Creates an endpoint that can be used in your TwiML App as the Voice Request Url.
 *
 * In order to make an outgoing call using Twilio Voice SDK, you need to provide a
 * TwiML App SID in the Access Token. You can run your server, make it publicly
 * accessible and use `/makeCall` endpoint as the Voice Request Url in your TwiML App.
 */
include('./vendor/autoload.php');
include('./config.php');

$callerId = 'client:quick_start';
$to = isset($_POST["to"]) ? $_POST["to"] : NULL;
if (empty($to) || !isset($to)) {
  $to = isset($_GET["to"]) ? $_GET["to"] : NULL;
}

/*
 * Use a valid Twilio number by adding to your account via https://www.twilio.com/console/phone-numbers/verified
 */
$callerNumber = '1234567890';

$response = new Twilio\Twiml();
if (empty($to) || !isset($to)) {
  $response->say('Congratulations! You have just made your first call! Good bye.');
} else if (is_numeric($to)) {
  $dial = $response->dial(
    array(
  	  'callerId' => $callerNumber
  	));
  $dial->number($to);
} else {
  $dial = $response->dial(
    array(
       'callerId' => $callerId
    ));
  $dial->client($to);
}

print $response;