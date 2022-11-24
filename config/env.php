<?php 

//connexion a la db Workspace en local
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbName = "workspace";
// $db = mysqli_connect($servername, $username, $password, $dbName)
//     or die('could not connect to database');


//connexion a la db online
$servername = "db5010944196.hosting-data.io";
$username = "dbu5496608";
$password = "kN9yLqby5AcFkf7$";
$dbName = "dbs9252931";
$db = mysqli_connect($servername, $username, $password, $dbName)
    or die('could not connect to database');
