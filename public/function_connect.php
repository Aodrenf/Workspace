<?php
function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "workspace";
    $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbName.';charset=utf8', $username, $password);
    if($pdo){
        //make errors throw exceptions
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }else{
        die("Could not create PDO connection.");
    }
}

$sql = connect();