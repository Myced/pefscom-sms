<?php 
 
 
// Get the PHP helper library from twilio.com/docs/php/install 
require_once '/Twilio/autoload.php'; // Loads the library 
 
use Twilio\Rest\Client; 
 
$account_sid = 'ACe93529dfbf73f1f38678f5d082b6c5a6'; 
$auth_token = 'c11eca0392f689b75a369f7d2924efc1'; 
$client = new Client($account_sid, $auth_token); 
 $message = $client->messages->create(
  '+237671984477', // Text this number
  array(
    'from' => '17609944741', // From a valid Twilio number
    
    'body' => 'FROM BUIB,ekombe has succeded bulk sms'
  )
);

print $message->sid;