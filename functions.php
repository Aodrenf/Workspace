<?php

function cors($SESSION)
{
  if(isset($_SESSION['name']))
 {
  $servername = "localhost";
  $username = "root"; 
  $password = "";
  $dbName = "badgeuse";
  $db = mysqli_connect($servername, $username, $password, $dbName)
  or die('could not connect to database');
  $login = $_SESSION['name'];
  $req = "SELECT count(name) FROM users where name= '".$login."'";
  $exec_req = mysqli_query($db,$req);
  $rep = mysqli_fetch_array($exec_req);
  $exist = $rep['count(name)'];
  if ($exist == 0)
  {
    echo "Vous n'existez pas dans la base de données";
    
  }
  else if ($exist == 1)
  {
    echo "nous allons vous connecter a la badgeuse";
    sleep(5);
    header('Location: badgeuse.php');
  }
  else echo "erreur inconnue";
 }
 
}