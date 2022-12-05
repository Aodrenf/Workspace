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

      //on recupere le email_id du user dans la table users
      $req_id = "SELECT */*'email_id'*/ FROM users where 
      email = '" . $email . "'";
      $exec_req_id = mysqli_query($db, $req_id);
      $rep_id = mysqli_fetch_array($exec_req_id);
      $email_id = $rep_id['id'];

      // on verifie si le user existe dans inventory
      $requete_inventory = "SELECT count(*) FROM inventory where 
      email_id = '" . $email_id . "'";
      $exec_requete_inventory = mysqli_query($db, $requete_inventory);
      $reponse_inventory = mysqli_fetch_array($exec_requete_inventory);
      $count_inventory = $reponse_inventory['count(*)'];
      
      // On va chercher le role du user dans la table role grace a son id
      $req_role = "SELECT */*'email_id'*/ FROM roles where 
      email_id = '" . $email_id . "'";
      $exec_req_role = mysqli_query($db, $req_role);
      $rep_role = mysqli_fetch_array($exec_req_role);
      $workspace_role = $rep_role['workspace_role'];
      $inventory_role = $rep_role['inventory_role'];
      $badgeuse_role = $rep_role['badgeuse_role'];
      $form_role = $rep_role['form_role'];


      if ($count_inventory != 0){
        $exist_inventory = true; 
      }
    
    if ($count != 0) {
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name;
      $_SESSION['email_id'] = $email_id;
      $_SESSION['workspace_role'] = $workspace_role;
      $_SESSION['inventory_role'] = $inventory_role;
      $_SESSION['badgeuse_role'] = $badgeuse_role;
      $_SESSION['form_role'] = $form_role;
      $_SESSION['workspace'] = true;
      //$_SESSION['id_user']
      if ($_SESSION['workspace_role'] == '1000') {
       header('Location: ../public/workspace_admin.php');

      } else if ($_SESSION['workspace_role'] == '1') {
        header('Location: ../public/workspace_user.php');
      } else echo "role inconnu"; var_dump($_SESSION);
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