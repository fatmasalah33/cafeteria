<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "cafeteria";
try {
    $connection = new PDO("mysql:host=localhost;dbname=cafeteria", $username, $password);
}
catch(PDOException $error)
{
    $error->getMessage();
}

?>