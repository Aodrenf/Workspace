<?php
session_start();
include_once('../functions/function_get_user.php');
include_once('../functions/function_trad_role.php');
if(isset($_POST))
{
    include_once('../functions/function_edit_user.php');
    editUser();
}
getUser($_SESSION['email_id']);
tradRole();
var_dump($_SESSION);
echo "//////////////////////////////////////////////////////////////////////";
var_dump($_SESSION['workspace_role']);
if($_SESSION['workspace_role'] == 1000)
{
    $link = "workspace_admin.php";
}elseif($_SESSION['workspace_role'] == 1)
{
    $link = "workspace_user.php";
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
    <input type="email" placeholder="Entrer votre email" name="email" value="<?php echo $_SESSION['get_email']?>" required>
    <br><br>
    <label><b>Nom</b></label>
    <input type="text" placeholder="Entrer le mot de passe" name="lastname" value="<?php echo $_SESSION['get_lastname']?>" required>
    <br><br>
    <label><b>Prenom</b></label>
    <input type="text" placeholder="Entrer le mot de passe" name="firstname" value="<?php echo $_SESSION['get_firstname']?>" required>
    <br><br>
    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="password" value="password" required>
    <br><br>
    <input type="submit" id='edit_user' value='edit_user'>
</form>
    <br><br>
    <a href="<?php echo $link;?>">Retour au Workspace</a>
</body>
</html>
<?php

