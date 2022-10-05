<?php

require('./db.php');

function updateTask($dbh, $id) {
    $query = "UPDATE todo SET is_end=1 WHERE id=${id};";
    $dbh->exec($query);
}

function deleteTask($dbh, $id) {
    $query = "DELETE FROM todo WHERE id = ${id};";
    $dbh->exec($query);
}

// delete
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['_method'] == 'DELETE'){
    $id = $_POST['id'] ?? null;
    if (!empty($id)) {
        deleteTask($dbh, $id);
    }
}

// put
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['_method'] == 'PUT'){
    $id = $_POST['id'] ?? null;
    if (!empty($id)) {
        updateTask($dbh, $id);
    }
}

header("Location: ${topPath}");
