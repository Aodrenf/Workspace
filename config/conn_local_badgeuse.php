<?php
//connexion a la db badgeuse en local
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "badgeuse";
$db = mysqli_connect($servername, $username, $password, $dbName)
    or die('could not connect to database');
