<?php
session_start();
include('../functions/function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
include('../functions/function_count_admin.php');
if(isset($_POST['delete']) && $_SESSION['count'] > 1)
{
    $_SESSION['modif_type'] = 'delete';
} else if ($_SESSION['count'] = 1 && isset($_POST['delete']))
{
    echo'<script language=javascript>
   alert(\'Vous ne pouvez pas supprimer le dernier admin !\');
</script> ';
    
}
    

if(isset($_POST['edit']))
{
    $_SESSION['modif_type'] = 'edit';
}elseif(isset($_POST['create']))
{
    $_SESSION['modif_type'] = 'create';
}


if ($_SESSION['workspace'] == true) {
    if (isset($_SESSION['modif_type'])) {
        if ($_SESSION['modif_type'] == 'create') {
            header('Location: create_user.php');
        } elseif ($_SESSION['modif_type'] == 'delete') {
            $_SESSION['user_id_edit'] = $_POST['user_id'];
            $_SESSION['del_link'] = 'management_admin.php';
            include('../functions/function_delete_user.php');
            unset($_POST['delete']);
            unset($_POST['del_link']);
        } elseif ($_SESSION['modif_type'] == 'edit') {
            $_SESSION['user_id_edit'] = $_POST['user_id'];
            header('Location: edit_user.php');
        }
    }

    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $role = $_SESSION['workspace_role'];
    if ($role == 1000)
        $role = 'Admin';
    else
        $role = 'Utilisateur';
}else header('Location: ../index.php');?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace by ContactMedia | Administrateurs</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<body>
    <!-- NAVIGATION -->
    <?php include ('../config/header.php') ?>
    <!-- END NAVIGATION -->
    <!-- MAIN -->
    <main>
        <!-- ASIDE -->
        <aside>
            <button id="close-btn">
                <span class="material-symbols-sharp">close</span>
            </button>

            <!-- SIDEBAR -->

            <div class="sidebar">
                <a href="../public/workspace_admin.php">
                    <span class="material-symbols-sharp">dashboard</span>
                    <h4>Accueil</h4>
                </a>
                <a href="management_admin.php"  class="active">
                    <span class="material-symbols-sharp">admin_panel_settings</span>
                    <h4>Administrateurs</h4>
                </a>
                <a href="management.php">
                    <span class="material-symbols-sharp">supervisor_account</span>
                    <h4>Utilisateurs</h4>
                </a>
            </div>
            <div class="account">
                <span class="material-symbols-sharp">badge</span>
                <a href="../public/account.php">
                    <h4>Accès Compte</h4>
                </a>
            </div>

            <!-- END SIDEBAR -->

        </aside>
        <!-- END ASIDE -->

        <!-- MIDDLE -->
        <section class="middle">
            <div class="header">
                <h1><span class="material-symbols-sharp">supervisor_account</span> Gestion des Admins</h1>
            </div>
            <!-- LIST ADMIN -->
            <div class="admin-user">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        include_once('../functions/function_connect.php');
                             $stmt = $sql->prepare("SELECT * FROM users NATURAL JOIN roles WHERE workspace_role = '1000' ORDER BY `firstname` ASC");
                             $stmt->execute();
                             $users = $stmt->fetchAll();  
                             foreach($users as $user){
                         ?>
                         <tr>
                             <td><b><?php echo $user['lastname']; ?></b></td>
                             <td><?php echo $user['firstname']; ?></td>
                             <td><?php echo $user['email']; ?></td>
                             
                             <td>
                             <form method="post">
                             <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                              <button type="submit" name="edit" class="material-symbols-outlined secondary">edit</button>
                             </form>
                             <form onsubmit="return confirm('Cet utilisateur sera supprimé')" action="" method="post">
                                 <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                 <button type="submit" name="delete" class="material-symbols-outlined danger">delete</button>
                             </form>
                                 </div>
                             </td>
                         </tr>
                         <?php }
     
                         // les redirects vers create ou edit
                       
                          ?>
                       </tbody>
                </table>
            </div>

            <!-- END LIST ADMIN -->
        </section>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <!-- JS -->
    <script src="../assets/js/main.js"></script>

</body>

</html>