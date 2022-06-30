<?php

private   $host = "localhost";
private   $dbname = "test";
private   $user = "root";
private   $pass = "";
private   $conn=null;

  

       try {
           $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
           $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           echo "Connected successfully"."<br>";

       }
       catch(PDOException $e) {

           echo 'ERROR: ' . $e->getMessage();
       }
  

?>
