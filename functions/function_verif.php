<?php
//dans ce fichier on verifiie si le user existe dans la db workspace 
//et on le connecte au workspace ensuite

header('Access-Control-Allow-Origin: *');
include('function_hash.php');
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
  //connexion à la base de données
  include('../config/conn_db.php');
  //include ('../config/conn_local_worspace.php');

  $name = NULL;
  $mail = $_POST['email'];
  $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
  $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
  $pass = hash_pwd($password);


  if ($email !== "" && $password !== "") {
    if ($email == "admin.admin@gmail.com") {
      $requete = "SELECT count(*) FROM admin where 
    email = '" . $email . "' and password = '" . $pass . "' ";
      $exec_requete = mysqli_query($db, $requete);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];
      $_SESSION['role'] = "admin";
    } else {
      $requete = "SELECT count(*) FROM users where 
    email = '" . $email . "' and password = '" . $pass . "' ";
      $exec_requete = mysqli_query($db, $requete);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];
      $_SESSION['role'] = "user";
    }
    if ($count != 0) {
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name;
      if ($_SESSION['role'] == 'admin') {
        header('Location: ../public/workspace_admin.php');
      } else if ($_SESSION['role'] == 'user') {
        header('Location: ../public/workspace_user.php');
      } else echo "role inconnu";
    } else {


      header('Location: ../public/index.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
  } else {
    header('Location: ../public/index.php?erreur=2'); // utilisateur ou mot de passe vide
  }
} else {
  header('Location: ../public/index.php');
}
mysqli_close($db); // fermer la connexion