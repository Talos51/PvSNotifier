#!/usr/bin/php
<?php
require('twitteroauth/autoload.php');
use Abraham\TwitterOAuth\TwitterOAuth;

date_default_timezone_set('GMT');
header('Content-Type: text/html; charset=utf-8');

// MESSAGE TO SEND RETRIEVED FROM CONSOLE: $ php pvsnotifier.php "MY MESSAGE" [--twitter|--push]
$text = $argv[1];
//TwitterOAuth
$CONSUMER_KEY = "TWITER_CONSUMER_KEY";
$CONSUMER_SECRET = "TWITTER_CONSUMER_SECRET";
$ACCESS_TOKEN = "TWITTER_ACCESS_TOKEN";
$TOKEN_SECRET = "TWITTER_ACCESS_TOKEN_SECRET";
$twitter_user = "YOUR PRIMARY TWITTER USER";
// Pushover
$app_token = "PUSHOVER_APP_TOKEN";
$user_key = "PUSHOVER_USER_KEY";

function pushover(){
        global $app_token, $user_key, $text;
        // Send Pushover Notification
        curl_setopt_array($ch = curl_init(), array(
          CURLOPT_URL => "https://api.pushover.net/1/messages.json",
          CURLOPT_POSTFIELDS => array(
            "token" => $app_token,
            "user" => $user_key,
            "message" => $text,
          ),
          CURLOPT_SAFE_UPLOAD => true,
          CURLOPT_RETURNTRANSFER => true,
        ));
        curl_exec($ch);
        curl_close($ch);
}

function twitterDM(){
        global $CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $TOKEN_SECRET, $text, $twitter_user;
        $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $TOKEN_SECRET);
        $connection->post('direct_messages/new', array('text' => $text, 'screen_name' => $twitter_user));
}

// Send Twitter DM Notification system
if( isset($argv[2]) && $argv[2] == "--twitter"){
        twitterDM();
}
// Else if pushover system
elseif( isset($argv[2]) && $argv[2] == "--push"){
        pushover();
}
// else both notification systems
else
{
        pushover();
        twitterDM();
}
?>
