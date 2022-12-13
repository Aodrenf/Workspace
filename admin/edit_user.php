
<?php
session_start();
include_once('../functions/function_get_user.php');
include_once('../functions/function_itoa.php');
include('../functions/function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
if(isset($_POST))
{
    include_once('../functions/function_edit_user.php');
    editUser();
}
getUser($_SESSION['user_id_edit']);
if($_SESSION['email'] == $_SESSION['get_email'])
{
    $_SESSION['edit_self'] = true;
    
}
itoa();


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
    <input type="password" placeholder="Entrer le mot de passe" name="password" placeholder="°°°°°°°°">
    <br><br>
    <label><b>Role workspace</b></label>
    <select name="workspace_role">
        <option value="<?php echo $_SESSION['get_workspace_role']?>" selected><?php echo $_SESSION['get_workspace_role']?></option>
        <option value="admin">admin</option>
        <option value="user">user</option>
    </select>
    <br><br>
    <label><b>Role badgeuse</b></label>
    <select name="badgeuse_role">
        <option value="<?php echo $_SESSION['get_badgeuse_role']?>" selected><?php echo $_SESSION['get_badgeuse_role']?></option>
        <option value="admin">admin</option>
        <option value="user">user</option>
    </select>
    <br><br>
    <label><b>Role form</b></label>
    <select name="form_role">
        <option value="<?php echo $_SESSION['get_form_role']?>" selected><?php echo $_SESSION['get_form_role']?></option>
        <option value="admin">admin</option>
        <option value="user">user</option>
    </select>
    <br><br>
    <label><b>Role inventaire</b></label>
    <select name="inventory_role">
        <option value="<?php echo $_SESSION['get_inventory_role']?>" selected><?php echo $_SESSION['get_inventory_role']?></option>
        <option value="admin">admin</option>
        <option value="user">user</option>
        <option value="NULL">NULL</option>

    </select>
    <BR></BR>
    <input type="submit" id='edit_user' value='edit_user'>
</form>
    <br><br>
    <a href="management_admin.php">Retour à la zone de management</a>
</body>
</html>


