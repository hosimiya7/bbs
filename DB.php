<?php
class DB{


  public function __construct()
  {
    include_once(dirname(__FILE__).'/config.php');
    $dbhost = $config['dbhost'];
    $dbname = $config['dbname'];
    $dbuser = $config['dbuser'];
    $dbpass = $config['dbpass'];

    $this->dsn = "mysql:dbname=$dbname;host=$dbhost";
    $this->user = $dbuser;
    $this->password = $dbpass;
  }

  public function getDBHandler()
  {
    try{
      $dbh = new PDO($this->dsn, $this->user, $this->password);
      return $dbh;
    } catch(PDOException $e){
      echo "接続失敗:".$e->getMessage()."\n";
      exit();
    }
  }
}

