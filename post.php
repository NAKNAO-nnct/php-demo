<?php

require('./db.php');


function postTask($dbh, $title) {
    $query = "INSERT INTO todo(title) VALUES('${title}');";
    $dbh->exec($query);
}

// post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = htmlspecialchars($_POST['title'] ?? '');
    if (!empty($title)) {
        postTask($dbh, $title);
    }
}

header("Location: $topPath");
