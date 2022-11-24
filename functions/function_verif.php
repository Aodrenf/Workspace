<?php
//dans ce fichier on verifiie si le user existe dans la db workspace 
//et on le connecte au workspace ensuite

header('Access-Control-Allow-Origin: *');
include('function_hash.php');
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
  //connexion à la base de données
  //include('../config/conn_db.php');
  include ('../config/env.php');

  $name = NULL;
  $mail = $_POST['email'];
  $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
  $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
  $pass = hash_pwd($password);


  if ($email !== "" && $password !== "") {
    if ($email == "admin.admin@gmail.com") {
      // on regarde si le mail et le pwd existe dans la db coté admin
      $requete = "SELECT count(*) FROM admin where 
    email = '" . $email . "' and password = '" . $pass . "'";
      $exec_requete = mysqli_query($db, $requete);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];
      $_SESSION['role'] = "admin";
            // on recupere le name de l'admin dans la db
            $req = "SELECT * FROM admin where 
            email = '" . $email . "'";
            $exec_req = mysqli_query($db, $req);
            $rep = mysqli_fetch_array($exec_req);
            $name = $rep['name'];
           
    } else {
       // on regarde si le mail et le pwd existe dans la db coté users
      $requete = "SELECT count(*) FROM users where 
    email = '" . $email . "' and password = '" . $pass . "' ";
      $exec_requete = mysqli_query($db, $requete);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];
      $_SESSION['role'] = "user";
      // on recupere le name du user dans la db
      $req = "SELECT * FROM users where 
      email = '" . $email . "'";
      $exec_req = mysqli_query($db, $req);
      $rep = mysqli_fetch_array($exec_req);
      $name = $rep['name'];

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