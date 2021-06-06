<?php 
require_once("Tweet.php");
require_once("Request.php");

$request = new Request;
$id = $request -> getPostedValue('id');

$delete = new Tweet;
$delete -> delete($id);

header('Location:bbs.php');

