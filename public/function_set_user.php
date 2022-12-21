<?php
//
// on créer une personne dans la db
//
function setUser()
{

  include_once('function_hash.php');
    if (isset($_POST['email'])) {
    $email = $_POST['email'];
    include('function_mail_already_exist.php');

    if (email_already_exist($email) == false) { // si il n'y a pas de mail identiaque alors :

      $prenom = $_POST['firstname'];
      $nom = $_POST['lastname'];
      $type = 'user';
      $badgeuse_role = $_POST['badgeuse_role'];
      $workspace_role = $_POST['workspace_role'];
      $form_role = $_POST['form_role'];
      $inventory_role = $_POST['inventory_role'];
      $pwd = $_POST['password'];
      $pwd = hash_pwd($pwd);

      // on fait un atoi 
      if ($workspace_role == 'admin') {
        $workspace_role = 1000;
      } elseif ($workspace_role == 'user') {
        $workspace_role = 1;
      } elseif ($workspace_role == 'supervisor') {
        $workspace_role = 3;
      } else
        $workspace_role = 1;

      if ($badgeuse_role == 'admin') {
        $badgeuse_role = 1000;
      } elseif ($badgeuse_role == 'manager') {
        $badgeuse_role = 2;
      } elseif ($badgeuse_role == 'supervisor') {
        $badgeuse_role = 3;
      } elseif ($badgeuse_role == 'user') {
        $badgeuse_role = 1;
      } else
        $badgeuse_role = 1;

      if ($form_role == 'admin') {
        $form_role = 1000;
      } elseif ($form_role == 'user') {
        $form_role = 1;
      } else
        $form_role = 1;

      if ($inventory_role == 'admin') {
        $inventory_role = 1000;
      } elseif ($inventory_role == 'user') {
        $inventory_role = 1;
      } elseif ($inventory_role == 'NULL') {
        $inventory_role = 0;
      } else
        $inventory_role = 0;

      try {
        include('config/env.php');
        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // on insere dans users ce qui nous servira pour la suite
        $sth = $dbco->prepare("
    INSERT INTO users (firstname, lastname, email, password)
    VALUES (:firstname, :lastname, :email, :password) 
  ");
        $sth->bindParam(':firstname', $prenom);
        $sth->bindParam(':lastname', $nom);
        $sth->bindParam(':email', $email);
        $sth->bindParam(':password', $pwd);
        $sth->execute();

        //on recuperer l'email_id de la nouvelle personne
        $req_id = "SELECT * FROM users where 
    email = '" . $email . "'";
        $exec_req_id = mysqli_query($db, $req_id);
        $rep_id = mysqli_fetch_array($exec_req_id);
        $email_id = $rep_id['id'];

        // on insere dans form_user
        $sth2 = $dbco->prepare("
    INSERT INTO form (email_id, type, email, password)
    VALUES (:email_id, :type, :email, :password) 
  ");

        $sth2->bindParam(':email_id', $email_id);
        $sth2->bindParam(':type', $type);
        $sth2->bindParam(':email', $email);
        $sth2->bindParam(':password', $pwd);
        $sth2->execute();

        // on insere dans inventory
        $sth3 = $dbco->prepare("
    INSERT INTO inventory (email_id, email, password)
    VALUES (:email_id, :email, :password) 
  ");

        $sth3->bindParam(':email_id', $email_id);
        $sth3->bindParam(':email', $email);
        $sth3->bindParam(':password', $pwd);
        $sth3->execute();

        // on insere dans role
        $sth4 = $dbco->prepare("
    INSERT INTO roles (email_id, badgeuse_role, workspace_role, form_role, inventory_role)
    VALUES (:email_id, :badgeuse_role, :workspace_role, :form_role, :inventory_role) 
  ");

        $sth4->bindParam(':email_id', $email_id);
        $sth4->bindParam(':badgeuse_role', $badgeuse_role);
        $sth4->bindParam('workspace_role', $workspace_role);
        $sth4->bindParam(':form_role', $form_role);
        $sth4->bindParam(':inventory_role', $inventory_role);
        $sth4->execute();



        echo "Parfait, tout s'est bien passé";
      } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }
      $_SESSION['modif_type'] = 'created';
      include('function_log.php');
      sendLog(initLog($email_id, $nom, $prenom, $email, $workspace_role, $badgeuse_role, $inventory_role, $form_role));
    } else{
      echo "l'email existe déja";}
      $_SESSION['modif_type'] ='created';
  }
      
}