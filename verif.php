<?php
session_start();
if(isset($_POST['name']) && isset($_POST['password']))
{
 // connexion à la base de données
 $servername = "localhost";
 $username = "root"; 
 $password = "";
 $dbName = "workspace";
 $db = mysqli_connect($servername, $username, $password, $dbName)
 or die('could not connect to database');
 

 
 // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
 // pour éliminer toute attaque de type injection SQL et XSS
 $name = mysqli_real_escape_string($db,htmlspecialchars($_POST['name'])); 
 $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
 
 if($name !== "" && $password !== "")
 {
 $requete = "SELECT count(*) FROM users where 
 name = '".$name."' and password = '".$password."' ";
 $exec_requete = mysqli_query($db,$requete);
 $reponse = mysqli_fetch_array($exec_requete);
 $count = $reponse['count(*)'];
 if($count!=0) // nom d'utilisateur et mot de passe correctes
 {
 $_SESSION['name'] = $name;
 header('Location: index.php');
 }
 else
 {
 header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
 }
 }
 else
 {
 header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
 }
}
else
{
 header('Location: login.php');
}
mysqli_close($db); // fermer la connexion