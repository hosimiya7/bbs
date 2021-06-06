<?php

class Request
{
  public function getPostedValue($text):string
  {
    return array_key_exists($text,$_POST) ? $_POST[$text] : '';
  }

  public function getQueryValue($key):string
  {
    return array_key_exists($key,$_GET) ? $_GET[$key] : '';
  }

  public function isPost():bool
  {
    return $_SERVER["REQUEST_METHOD"] === "POST";
  }
}
?>