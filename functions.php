<?php

function cors($SESSION)
{
  if(isset($_SESSION['email']))
 {
  $servername = "db5010944196.hosting-data.io";
  $username = "dbu5496608"; 
  $password = "kN9yLqby5AcFkf7$";
  $dbName = "dbs9252931";
  $db = mysqli_connect($servername, $username, $password, $dbName)
  or die('could not connect to database');
  $login = $_SESSION['email'];
  $req = "SELECT count(email) FROM users where email= '".$login."'";
  $exec_req = mysqli_query($db,$req);
  $rep = mysqli_fetch_array($exec_req);
  $exist = $rep['count(email)'];
  if ($exist == 0)
  {
    echo "Vous n'existez pas dans la base de données";
    
  }
  else if ($exist == 1)
  {
    header('Location: badgeuse.php');
  }
  else echo "erreur inconnue";
 }
 
}


//fonction de hash
function hashh($password)
{
//$password = "test";
$prefix_salt = md5('pomme');
$suffix_salt = md5('tableau');
$pass = md5($password);
$posthash = $prefix_salt . $pass . $suffix_salt;
$algo = "sha256";
$pass_hashed = hash($algo, $posthash, false);
return $pass_hashed;
}