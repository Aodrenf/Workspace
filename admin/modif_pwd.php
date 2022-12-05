<?php
include('../functions/function_hash.php');
session_start();
if (isset($_POST['password'])) {
  //connexion à la base de données
  //include('../config/conn_db.php');
  include_once ('env.php');

  $name = NULL;
  $mail = $_POST['email'];
  $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
  $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
  $pass = hash_pwd($password);
  


  if ($password !== "") {
    
       // on regarde si le mail et le pwd existe dans la db coté users
      $requete = "SELECT count(*) FROM users where 
      password = '" . $pass . "' ";
      $exec_requete = mysqli_query($db, $requete);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];
  }
  if ($count != 0) {
    //On modifie le password dans users du workspace
    $sth4 = $dbco->prepare("
    UPDATE users
    SET password = '$pwd'
    WHERE id='$email_id'
  ");
  $sth4->execute();


      // on modifie le mail dans la table form_users
      $sth2_3 = $dbco->prepare("
      UPDATE users
      SET password = '$pwd'
      WHERE id='$email_id'
    ");
    $sth2_3->execute();

    // on modifie le password dans la table inventaire_users
  $sth4_2 = $dbco->prepare("
    UPDATE inventory_users
    SET password = '$pwd'
    WHERE id='$email_id'
  ");
  $sth4_2->execute();

  // on modifie le password dans la table badgeuse
//   $sth = $dbco->prepare("
//     UPDATE badgeuse
//     SET email = '$mail'
//     WHERE id='$email_id'
 // ");
  //$sth->execute();
    

    }
}