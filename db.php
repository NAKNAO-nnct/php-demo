<?php

require('./config.php');

$dsn = "mysql:dbname=${database};host=${serverhost}";
try{
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    print_r('Error:'.$e->getMessage());
    die();
}
