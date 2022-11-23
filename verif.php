<?php
   header('Access-Control-Allow-Origin: *');
   include_once ('functions.php');
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
  //connexion à la base de données locale
 $servername = "localhost";
 $username = "root"; 
 $password = "";
 $dbName = "workspace";
 $db = mysqli_connect($servername, $username, $password, $dbName)
 or die('could not connect to database');
 

 /* connexion à la base de données 
 $servername = "localhost";
 $username = "root"; 
 $password = "";
 $dbName = "workspace";
 $db = mysqli_connect($servername, $username, $password, $dbName)
 or die('could not connect to database');
 */
 $name = NULL;
 $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['email'])); 
 $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
 $pass = hashh($password);
 if($email !== "" && $password !== "")
 {
 $requete = "SELECT count(*) FROM users where 
 email = '".$email."' and password = '".$pass."' ";
 $exec_requete = mysqli_query($db,$requete);
 $reponse = mysqli_fetch_array($exec_requete);
 $count = $reponse['count(*)'];
 if($count!=0) // nom d'utilisateur et mot de passe correctes
 {
 $_SESSION['email'] = $email;
 $_SESSION['name'] = $name;
 header('Location: index.php');
 }
 else
 {
   var_dump($pass);
   var_dump($email);
   var_dump($count); 
 //header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
 }
 }
 else
 {
   var_dump($_SESSION['email']);
   var_dump($email);
 //header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
 }
}
else
{
   var_dump($email);
   var_dump($_POST);
 //header('Location: login.php');
}
mysqli_close($db); // fermer la connexion