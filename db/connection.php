<?php

$host = '127.0.0.1';
$db = 'google_ad';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';



$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo 'Hello Database';
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
  // echo "<h1 class='text-danger'>No Database Found!!</h1>";
}


require_once 'dataFunctions.php';
$cases = new Data($pdo);
?>