<?php

namespace MercuryHolidays\Search;

use PDO;
use PDOException;
use MercuryHolidays\DotEnv;

class Conn{

  public function newDB()
  {
    (new DotEnv('.env'))->load();
      $dbN = getenv('DATABASE_NAME');
      $dbH = getenv('DATABASE_HOST');
      $username = getenv('DATABASE_USER');
      $password = getenv('DATABASE_PASSWORD');
    try {
        $conn = new PDO("$dbH;$dbN", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
  }

}
?>