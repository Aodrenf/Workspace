<?php
//dans ce fichier on verifiie si le user existe dans la db workspace 
//et on le connecte au workspace ensuite

//header('Access-Control-Allow-Origin: *');
//
//
// le cors a faire avec les jwt
//
//
//


include('function_hash.php');
session_start();
var_dump($_SESSION);

//Si on va sur l'app inventaire direct sans passer par le workspace

if (isset($_POST['email']) && isset($_POST['password'])) {
  //connexion à la base de données
  include ('../config/env.php');

  $name = NULL;
  $mail = $_POST['email'];
  $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
  $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
  $pass = hash_pwd($password);


  if ($email !== "" && $password !== "") {
    
       // on regarde si le mail et le pwd existe dans la table inventory
      $requete = "SELECT count(*) FROM ticketing where 
    email = '" . $email . "' and password = '" . $pass . "' ";
      $exec_requete = mysqli_query($db, $requete);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];

      //on recupere son email_id

      $req_id = "SELECT */*'email_id'*/ FROM users where 
      email = '" . $email . "'";
      $exec_req_id = mysqli_query($db, $req);
      $rep_id = mysqli_fetch_array($exec_req);
      $email_id = $rep_id['email_id'];

      
      // on recupere le name du user dans la db
      $req = "SELECT * FROM users where 
      email = '" . $email . "'";
      $exec_req = mysqli_query($db, $req);
      $rep = mysqli_fetch_array($exec_req);
      $name = $rep['name'];

      // on recupere son role
      $req2 = "SELECT * FROM roles where 
      email_id = '" . $email_id . "'";
      $exec_req2 = mysqli_query($db, $req);
      $rep2 = mysqli_fetch_array($exec_req);
      $ticketing_role = $rep2['ticketing_role'];

      
// on verifie si la personne existe dans la db de lu ticketing
    if ($count != 0) {
      $_SESSION['ticketing_role'] = $ticketing_role;
      $_SESSION['ticketing'] = true;
      if ($_SESSION['ticketing_role'] == 1000)
      {
        header('Location: ../ticketing/ticketing.php');
      } else  header('Location: ../ticketing/my_tickets.php');
     
    } else {


      //header('Location: public/ticketing.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
  } else {
    //header('Location: public/ticketing.php?erreur=2'); // utilisateur ou mot de passe vide
  }
} 



// si l'utilisateur est deja log sur le Workspace
else if( ($_SESSION['workspace']) == true){
    if(isset($_SESSION['ticketing_role']))
    {
      if ($_SESSION['ticketing_role'] == 1000)
      {
        header('Location: ../ticketing/ticketing.php');
      } else  header('Location: ../ticketing/my_tickets.php');
    }
} else
  header('Location: ../public/wokspace_admin.php');

