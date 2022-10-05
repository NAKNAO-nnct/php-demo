<?php

// DB設定
$servername = 'mysql';
$username = 'root';
$password = 'password';
$database = 'todo';

$dsn = "${servername}:dbname=${database};host=${servername}";
try{
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    print_r('Error:'.$e->getMessage());
    die();
}
