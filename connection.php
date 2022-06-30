<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "cafeteria";
try {
    $connection = new PDO("mysql:host=localhost;dbname=storedb", $username, $password);
}
catch(PDOException $error)
{
    $error->getMessage();
}

?>