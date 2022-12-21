<?php
function editUser()
    {
      $_SESSION['modif_type'] ='';
    $email_id = $_SESSION['user_id_edit'];
    include('function_count_admin.php');
        if ($_SESSION['count'] == 1 && ($_POST['workspace_role'] != 'Admin' ) && $_SESSION['get_workspace_role'] == 1000)
        {
            echo '<script language=javascript>
   alert(\'Vous ne pouvez pas editer le dernier admin !\');
</script> ';
        }else
        {
     
  if (isset($_POST['email'])) {
    // on verifie que l'email n'existe pas deja
    $email_self = $_SESSION['get_email'];
    $email = $_POST['email'];
    include_once('function_mail_already_exist.php');
    email_already_exist($email);
    if (email_already_exist($email) == true && ($email != $email_self)) {
      echo "l'email existe deja";
      } else {
        include_once('function_hash.php');

        $prenom = $_POST['firstname'];
        $nom = $_POST['lastname'];

        // on verifie que le mdp n'est pas vide
        if (isset($_POST['password'])) {
          $pwd = $_POST['password'];
          $pwd = hash_pwd($pwd);
        } else
          $pwd = "a491d410622c465a199a26895f0dbaf28272837d5bb4b6973126c30f25ba5db3";


        // remettre les roles en nombre

        if (isset($_POST['workspace_role'])) {
          include('function_atoi.php');
          $badgeuse_role = $_POST['badgeuse_role'];
          $workspace_role = $_POST['workspace_role'];
          $form_role = $_POST['form_role'];
          $inventory_role = $_POST['inventory_role'];
        } else {
          $badgeuse_role = "";
          $workspace_role = "";
          $form_role = "";
          $inventory_role = "";

        }
        try {
          include('config/env.php');
          $servername = 'localhost';
          $dbName = 'workspace';
          $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
          $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          //On prépare la requête et on l'exécute
          if ($prenom != "") {
            //On modifie le prenom dans le table users du workspace
            $sth = $dbco->prepare("
                  UPDATE users
                  SET firstname = '$prenom'
                  WHERE id='$email_id'
                ");
            $sth->execute();

          }

          ////////////////////////////////////////////////////////////////////

          if ($nom != "") {
            //On change le nom dans la table users du workspace 
            $sth1_1 = $dbco->prepare("
                UPDATE users
                SET lastname = '$nom'
                WHERE id='$email_id'
              ");
            $sth1_1->execute();

          }

          //////////////////////////////////////////////////////////////////////

          if ($email != "") {
            //On modifie le mail dans users du workspace
            $sth2 = $dbco->prepare("
                UPDATE users
                SET email = '$email'
                WHERE id='$email_id'
              ");
            $sth2->execute();
            // on modifie le mail dans la table inventaire
            $sth2_2 = $dbco->prepare("
                UPDATE inventory
                SET email = '$email'
                WHERE email_id='$email_id'
              ");
            $sth2_2->execute();

            // on modifie le mail dans la table form
            $sth2_3 = $dbco->prepare("
                UPDATE form
                SET email = '$email'
                WHERE email_id='$email_id'
              ");
            $sth2_3->execute();
            // on modifie le mail dans la table badgeuse
            //   $sth = $dbco->prepare("
            //     UPDATE badgeuse
            //     SET email = '$email'
            //     WHERE emailid='$email_id'
            // ");
            //$sth->execute();

            ////////////////////////////////////////////////////////////////////////

          }

          if ($pwd != "a491d410622c465a199a26895f0dbaf28272837d5bb4b6973126c30f25ba5db3") {
            //On modifie le password dans users du workspace
            $sth4 = $dbco->prepare("
                UPDATE users
                SET password = '$pwd'
                WHERE id='$email_id'
              ");
            $sth4->execute();


            // on modifie le pwd dans la table form
            $sth2_3 = $dbco->prepare("
                  UPDATE form
                  SET password = '$pwd'
                  WHERE email_id='$email_id'
                ");
            $sth2_3->execute();

            // on modifie le password dans la table inventaire
            $sth4_2 = $dbco->prepare("
                UPDATE inventory
                SET password = '$pwd'
                WHERE email_id='$email_id'
              ");
            $sth4_2->execute();

            // on modifie le password dans la table badgeuse
            //   $sth = $dbco->prepare("
            //     UPDATE badgeuse
            //     SET email = '$email'
            //     WHERE email_id='$email_id'
            // ");
            //$sth->execute();
          }

          //////////////////////////////////////////////////////////////////////////////

          if ($badgeuse_role != "") {
            //On prépare la requête et on l'exécute
            $sth3 = $dbco->prepare("
                UPDATE roles
                SET badgeuse_role = '$badgeuse_role'
                WHERE email_id='$email_id'
              ");
            $sth3->execute();

          }

          //////////////////////////////////////////////////////////////////////////

          if ($workspace_role != "") {
            //On prépare la requête et on l'exécute
            $sth5 = $dbco->prepare("
                UPDATE roles
                SET workspace_role = '$workspace_role'
                WHERE email_id='$email_id'
              ");
            $sth5->execute();

          }

          /////////////////////////////////////////////////////////////////////////

          if ($form_role != "") {
            //On prépare la requête et on l'exécute
            $sth6 = $dbco->prepare("
                UPDATE roles
                SET form_role = '$form_role'
                WHERE email_id='$email_id'
              ");
            $sth6->execute();

          }

          /////////////////////////////////////////////////////////////////////////////

          if ($inventory_role != "") {
            //On prépare la requête et on l'exécute
            $sth7 = $dbco->prepare("
                UPDATE roles
                SET inventory_role = '$inventory_role'
                WHERE email_id='$email_id'
              ");
            $sth7->execute();
            include('function_log.php');
            $_SESSION['modif_type'] = 'edited';
            //sendLog(initLog($email_id, $nom, $prenom, $email, $workspace_role, $badgeuse_role, $inventory_role, $form_role));
            
          }
        } catch (PDOException $e) {
          echo "Erreur : " . $e->getMessage();
        }

      }
    }
  }
}
