<?php

require('../config.php');

$dsn = "mysql:host=${serverhost}";
try{
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    print_r('Error:'.$e->getMessage());
    die();
}

$initQuerys = file_get_contents('./init.sql', true);
$dbh->exec($initQuerys);

header("Location: ${topPath}");
