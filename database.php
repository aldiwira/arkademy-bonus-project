<?php

$url = "localhost";
$user = "root";
$pass = "";
$database = "arkademy";

$db = mysqli_connect($url, $user, $pass, $database) or die("Connecting to MySQL failed");
try {
    $conpdo = new PDO("mysql:host={$url};dbname={$database}", $user, $pass);
}

// show error
catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
