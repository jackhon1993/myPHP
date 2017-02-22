<?php

    session_start();

require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '602956089903982',
  'app_secret' => '6086208b06e7ea30b38aaf50d4f57ae7',
  'default_graph_version' => 'v2.5',
]);

$accessToken = $_SESSION['facebook_access_token'];

// Sets the default fallback access token so we don't have to pass it to each request
$fb->setDefaultAccessToken($accessToken);

try {
  //$response = $fb->get('/me');
    $response = $fb->get('/me?fields=id,name', $accessToken);
  $userNode = $response->getGraphUser();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

echo 'Logged in as ' . $userNode->getName();