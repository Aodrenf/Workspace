<?php
//dans ce fichier on verifiie si le user existe dans la db workspace 
//et on le connecte au workspace ensuite

//header('Access-Control-Allow-Origin: *');
include('../functions/function_hash.php');
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
  //connexion à la base de données
  //include('../config/conn_db.php');
  include ('env.php');

  $name = NULL;
  $mail = $_POST['email'];
  $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
  $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
  $pass = hash_pwd($password);


  if ($email !== "" && $password !== "") {
    
       // on regarde si le mail et le pwd existe dans la db coté users
      $requete = "SELECT count(*) FROM users where 
    email = '" . $email . "' and password = '" . $pass . "' ";
      $exec_requete = mysqli_query($db, $requete);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];

      // on recupere le name du user dans la db
      $req = "SELECT * FROM users where 
      email = '" . $email . "'";
      $exec_req = mysqli_query($db, $req);
      $rep = mysqli_fetch_array($exec_req);
      $name = $rep['firstname'];

      //on recupere le email_id
      $req_id_inventory = "SELECT */*'email_id'*/ FROM inventory where 
      email_id = '" . $email_id . "'";
      $exec_req_id_inventory = mysqli_query($db, $req_inventory);
      $rep_id_inventory = mysqli_fetch_array($exec_req_inventory);
      $email_id_inventory = $rep_id_inventory['email_id'];
      $exist_inventory = true; 

    
    if ($count != 0) {
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name;
      //$_SESSION['id_user']
      if ($_SESSION['role'] == '1000') {
       header('Location: ../public/workspace_admin.php');

      } else if ($_SESSION['role'] == '1') {
        header('Location: ../public/workspace_user.php');
      } else echo "role inconnu";
    } else {


      header('Location: ../index.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
  } else {
    header('Location: ../index.php?erreur=2'); // utilisateur ou mot de passe vide
  }
} else {
  header('Location: ../index.php');
}
mysqli_close($db); // fermer la connexion