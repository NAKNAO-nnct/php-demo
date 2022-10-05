<?php
// DB設定
$servername = "mysql";
$username = "root";
$password = "password";

$dsn = $servername . ':host=' . $servername;
try{
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    print_r('Error:'.$e->getMessage());
    die();
}

$initQuerys = file_get_contents('./init.sql', true);
$dbh->exec($initQuerys);

header("Location: /");
