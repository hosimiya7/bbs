<?php
require_once("Tweet.php");
require_once("Request.php");


$request = new Request;
$id = $request->getPostedValue('id');

$tweet = new Tweet;
$tweet->favorite($id);

header("Content-type: application/json; charset=UTF-8");
echo json_encode($tweet->getRecord($id));
exit;
