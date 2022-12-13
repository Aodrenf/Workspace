<?php
session_start();
include('../functions/function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
if(isset($_POST['password']))
{
    $email_id = $_SESSION['email_id'];
    include('../functions/function_hash.php');
    $pwd = hash_pwd($_POST['password']);
    if ($pwd != "a491d410622c465a199a26895f0dbaf28272837d5bb4b6973126c30f25ba5db3") {
        include('../config/env.php');
        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition des utilisateurs</title>
</head>
<body>
<form action="" method="POST">
    <label><b>Email</b></label>
    <input type="email" placeholder="Entrer votre email" name="email" value="<?php echo $_SESSION['email']?>" disabled>
    <br><br>
    <label><b>Nom</b></label>
    <input type="text" placeholder="Entrer le mot de passe" name="lastname" value="<?php echo $_SESSION['lastname']?>" disabled>
    <br><br>
    <label><b>Prenom</b></label>
    <input type="text" placeholder="Entrer le mot de passe" name="firstname" value="<?php echo $_SESSION['firstname']?>" disabled>
    <br><br>
    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="*************" name="password" >
    <br><br>
    <input type="submit" id='edit_user' value='changer le mot de passe'>
</form>
    <br><br>
    <a href="workspace_admin.php">Retour au Workspace</a>
</body>
</html>
<?php



