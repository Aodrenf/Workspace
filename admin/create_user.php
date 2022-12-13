
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_user</title>
</head>
<body>
<form action="" method="POST">
    <label><b>Email</b></label>
    <input type="email" placeholder="Entrer votre email" name="email" required>

    <label><b>Nom</b></label>
    <input type="text" placeholder="Entrer le mot de passe" name="lastname" required>
    <br>
    <label><b>Prenom</b></label>
    <input type="text" placeholder="Entrer le mot de passe" name="firstname" required>
    <br>
    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
    <br>
    <label><b>Role workspace</b></label>
    <select name="workspace_role">
        <option value="admin">admin</option>
        <option value="moderator">Responsable</option>
        <option value="user"selected>User</option>
    </select>
    <br>
    <label><b>Role badgeuse</b></label>
    <select name="badgeuse_role" >
        <option value="admin">Admin</option>
        <option value="manager">Manager</option>
        <option value="supervisor">Responsable</option>
        <option value="user" selected>User</option>
    </select>
    <br>
    <label><b>Role form</b></label>
    <select name="form_role">
        <option value="admin">Admin</option>
        <option value="user" selected>User</option>
        
    </select>
    <br>
    <label><b>Role inventaire</b></label>
    <select name="inventory_role">
        <option value="admin">Admin</option>
        <option value="user" >User</option>
        <option value="NULL" selected>NULL</option>

    </select>
    <br>
    <input type="submit" id='create_user' value='create_user'>
</form>
    <br><br>
    <a href="management.php">Retour à la zone de management</a>
</body>
</html>
<?php 
include('../functions/function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
if(isset($_POST))
{
    include_once('../functions/function_set_user.php');
    setUser();
}
