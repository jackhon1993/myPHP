<?php

    session_start();

require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '602956089903982',
  'app_secret' => '6086208b06e7ea30b38aaf50d4f57ae7',
  'default_graph_version' => 'v2.5',
]);


$helper = $fb->getRedirectLoginHelper();
$_SESSION['FBRLH_state'] = $_GET['state'];
try {
  $accessToken = $helper->getAccessToken();
    //$accessToken = "EAAIjxf2USZAoBAIfeBsOtiZAfoqybStt8UGJFrwJUZCJgJ4qVcHXeDVEZCmJaEe6vrJgHM0RgMl24UQn3Mr0His1fpbBJCnca9l4v7uRHamZBB2qRRaiThLzCFEndBv4GJDMWKtn72pzvrPuX2bQaod4QtKcvXTpy941yVOuUNORYKo8GeyyuEoAtgZAnv9ZAIZD";
    
    
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}


if (isset($accessToken)) {
   $url = 'main.php';
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
    header('Location:'.$url);
	
  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}