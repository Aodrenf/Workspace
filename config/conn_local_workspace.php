<?php
//connexion a la db Workspace en local
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "workspace";
$db = mysqli_connect($servername, $username, $password, $dbName)
    or die('could not connect to database');
