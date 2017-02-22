<?php

    session_start();


	require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '602956089903982',
  'app_secret' => '6086208b06e7ea30b38aaf50d4f57ae7',
  'default_graph_version' => 'v2.5',
]);



$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
$loginUrl = $helper->getLoginUrl('http://testblog.applinzi.com/facebook/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';