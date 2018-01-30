<?php
/*
 * Creates an endpoint that plays back a greeting.
 */
include('./vendor/autoload.php');
include('./config.php');

$response = new Twilio\Twiml();
$response->say('Congratulations! You have received your first inbound call! Good bye.');
print $response;