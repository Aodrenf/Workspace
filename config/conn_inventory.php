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


include('../functions/function_hash.php');
session_start();
$_SESSION['inventory'] = true;

//Si on va sur l'app inventaire direct sans passer par le workspace

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
    
       // on regarde si le mail et le pwd existe dans la db users
      $requete = "SELECT count(*) FROM inventory where 
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
      $req2 = "SELECT */*'inventory_role'*/ FROM roles where 
      email_id = '" . $email_id . "'";
      $exec_req2 = mysqli_query($db, $req);
      $rep2 = mysqli_fetch_array($exec_req);
      $inventory_role = $rep2['inventory_role'];

      $_SESSION['inventory_role'] = $inventory_role;

    if ($count != 0) {
      $_SESSION['inventory_role'] = $inventory_role;
      if ($_SESSION['inventory_role'] == '1000') {
       header('Location: ../public/inventory_admin.php');

      } else if ($_SESSION['inventory_role'] == '1') {
        header('Location: ../public/inventory_user.php');
      } else echo "role inconnu";
    } else {


      header('Location: ../inventory.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
  } else {
    header('Location: ../inventory.php?erreur=2'); // utilisateur ou mot de passe vide
  }
} 



// si l'utilisateur est deja log sur le Workspace
else if( ($_SESSION['inventory']) == true){
  include ('env.php');
      //on recupere son email_id_user
      $email_id_users = $_SESSION['id_user'];

      if($email_id_users > 0) {
        //on recupere son email_id_inventaire
        $req_id_inventory = "SELECT */*'email_id'*/ FROM inventory where 
        email_id = '" . $email_id . "'";
        $exec_req_id_inventory = mysqli_query($db, $req_inventory);
        $rep_id_inventory = mysqli_fetch_array($exec_req_inventory);
        $email_id_inventory = $rep_id_inventory['email_id'];
        $exist_inventory = true; 
        
        // on recupere son role
        $req2 = "SELECT */*'inventory_role'*/ FROM roles where 
        email_id = '" . $email_id . "'";
        $exec_req2 = mysqli_query($db, $req);
        $rep2 = mysqli_fetch_array($exec_req);
        $inventory_role = $rep2['inventory_role'];

        $_SESSION['inventory_role'] = $inventory_role;
      

    if ($count != 0)
    {
      $_SESSION['inventory_role'] = $inventory_role;
      if ($_SESSION['inventory_role'] == '1000') 
      {
       header('Location: ../public/inventory_admin.php');

      } 
      else if ($_SESSION['inventory_role'] == '1') 
      {
        header('Location: ../public/inventory_user.php');
      }
      else echo "role inconnu";
    }

    else {
      header('Location: ../inventory_user.php?erreur=1'); // utilisateur ou mot de passe incorrect   
    } 
    // a ajouter a inventory.php
    //
    // if (isset($_GET['erreur'])) {
    //   $err = $_GET['erreur'];
    //   if ($err == 1 || $err == 2)
    //       echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
  }else {
    header('Location: ../inventory_user.php?erreur=2'); // utilisateur ou mot de passe vide
  } 
  }else {
    //header('Location: ../index.php');
    var_dump($_SESSION);
  }

mysqli_close($db); // fermer la connexion