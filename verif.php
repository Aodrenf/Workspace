<?php
   header('Access-Control-Allow-Origin: *');
   include_once ('functions.php');
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
  /*//connexion à la base de données locale
 $servername = "localhost";
 $username = "root"; 
 $password = "";
 $dbName = "workspace";
 $db = mysqli_connect($servername, $username, $password, $dbName)
 or die('could not connect to database');*/
 

 // connexion à la base de données 
 $servername = "db5010944196.hosting-data.io";
 $username = "dbu5496608"; 
 $password = "kN9yLqby5AcFkf7$";
 $dbName = "dbs9252931";
 $db = mysqli_connect($servername, $username, $password, $dbName)
 or die('could not connect to database');
 
 $name = NULL;
 $mail = $_POST['email'];
 $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['email'])); 
 $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
 $pass = hashh($password);
 if($email !== "" && $password !== "")
 {
  if($email == "admin.admin@gmail.com")
  {
    $requete = "SELECT count(*) FROM admin where 
    email = '".$email."' and password = '".$pass."' ";
    $exec_requete = mysqli_query($db,$requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    $_SESSION['role'] = "admin";
  }
  else{
    $requete = "SELECT count(*) FROM users where 
    email = '".$email."' and password = '".$pass."' ";
    $exec_requete = mysqli_query($db,$requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    $_SESSION['role'] = "user";
  }
 if($count!=0) // nom d'utilisateur et mot de passe correctes
 {
  $_SESSION['email'] = $email;
  $_SESSION['name'] = $name;
  if ($_SESSION['role'] == 'admin') {
   header('Location: workspace_admin.php');
  }
  else if ($_SESSION['role'] == 'user'){
   header('Location: workspace_user.php');
  }
  else echo "role inconnu";
 }
 
 else
 {
 header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
 }
 }
 else
 {
  header('Location: index.php?erreur=2'); // utilisateur ou mot de passe vide
 }
}
else
{
 header('Location: index.php');
}
mysqli_close($db); // fermer la connexion