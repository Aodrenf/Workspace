<?php
session_start();
var_dump($_SESSION);

if ($_SESSION['workspace'] == true) {
    
        include_once('function_get_user.php');
        include_once('function_itoa.php');
        include('function_timer.php');
        getUser($_SESSION['user_id_edit']);  
        if (!isset($_SESSION['timer'])) {
            setTimer();
        };
        timer();
        if (isset($_POST['email'])) {
            include_once('function_edit_user.php');
            editUser();
            getUser($_SESSION['user_id_edit']);
        }

        // si l'admin s'auto edit on met a jour ses informations
        if ($_SESSION['email'] == $_SESSION['get_email'] && isset($_POST['firstname'])) {
            $_SESSION['edit_self'] = true;
            $_SESSION['edit_self_firstname'] = $_SESSION['get_firstname'];
            $_SESSION['edit_self_lastname'] = $_SESSION['get_lastname'];
            $_SESSION['edit_self_workspace_role'] = $_SESSION['get_workspace_role'];
            $_SESSION['edit_self_badgeuse_role'] = $_SESSION['get_badgeuse_role'];
            $_SESSION['edit_self_form_role'] = $_SESSION['get_form_role'];
            $_SESSION['edit_self_inventory_role'] = $_SESSION['get_inventory_role'];
            $_SESSION['edit_self_email'] = $_SESSION['get_email'];
        }
        if ($_SESSION['email'] != $_SESSION['get_email'] && isset($_POST['firstname'])) {
            unset($_SESSION['edit_self']);
            unset($_SESSION['edit_self_lastname']);
            unset($_SESSION['edit_self_firstname']);
            unset($_SESSION['edit_self_badgeuse_role']);
            unset($_SESSION['edit_self_workspace_role']);
            unset($_SESSION['edit_self_form_role']);
            unset($_SESSION['edit_self_inventory_role']);
            unset($_SESSION['edit_self_email']);
        }
        itoa();

        if ($_SESSION['workspace_role'] == 1000) {
            $status = true;
        } else $status = "none"

?>
        <!DOCTYPE html>
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
                <input type="email" placeholder="Entrer votre email" name="email" value="<?php echo $_SESSION['get_email'] ?>" required>
                <br><br>
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="lastname" value="<?php echo $_SESSION['get_lastname'] ?>" required>
                <br><br>
                <label><b>Prenom</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="firstname" value="<?php echo $_SESSION['get_firstname'] ?>" required>
                <br><br>
                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" placeholder="°°°°°°°°">
                <br><br>
                <label><b>Role workspace</b></label>
                <select name="workspace_role">
                    <option value="<?php echo $_SESSION['get_workspace_role'] ?>" selected><?php echo $_SESSION['get_workspace_role'] ?></option>
                    <option style="display: <?php echo $status ?>;" value="admin">Admin</option>
                    <option value="user">Utilisateur</option>
                    <option value="supervisor">Responsable</option>

                </select>
                <br><br>
                <label><b>Role badgeuse</b></label>
                <select name="badgeuse_role">
                    <option value="<?php echo $_SESSION['get_badgeuse_role'] ?>" selected><?php echo $_SESSION['get_badgeuse_role'] ?></option>
                    <option style="display: <?php echo $status ?>;" value="admin">Admin</option>
                    <option value="user">Utilisateur</option>
                    <option value="manager">Manager</option>
                    <option value="supervisor">Responsable</option>


                </select>
                <br><br>
                <label><b>Role form</b></label>
                <select name="form_role">
                    <option value="<?php echo $_SESSION['get_form_role'] ?>" selected><?php echo $_SESSION['get_form_role'] ?></option>
                    <option style="display: <?php echo $status ?>;" value="admin">Admin</option>
                    <option value="user">Utilisateur</option>
                </select>
                <br><br>
                <label><b>Role inventaire</b></label>
                <select name="inventory_role">
                    <option value="<?php echo $_SESSION['get_inventory_role'] ?>" selected><?php echo $_SESSION['get_inventory_role'] ?></option>
                    <option style="display: <?php echo $status ?>;" value="admin">Admin</option>
                    <option value="user">Utilisateur</option>
                    <option value="NULL">NULL</option>

                </select>
                <BR></BR>
                <input type="submit" id='edit_user' value='edit_user'>
            </form>
            <br><br>
            <a href="management.php">Retour à la zone de management</a>
        </body>

        </html>

<?php
} else
    header('Location: index.php');
