<?php

require('./config.php');

$dsn = "${servername}:dbname=${database};host=${servername}";
try{
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    print_r('Error:'.$e->getMessage());
    die();
}
