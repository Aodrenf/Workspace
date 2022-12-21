<?php
session_start();

if ($_SESSION['workspace'] == true) {
    unset($_SESSION['edit_self']); 
    include('function_timer.php');
    if (!isset($_SESSION['timer'])) {
        setTimer();
    }
    ;
    timer();
    // si il reste plus d'un admin, on se met en mode delete
    include('function_count_admin.php');
    if (isset($_POST['delete']) && $_SESSION['count'] > 1) {
        $_SESSION['modif_type'] = 'delete';
    } else if ($_SESSION['count'] = 1 && isset($_POST['delete'])) {
        echo '<script language=javascript>
   alert(\'Vous ne pouvez pas supprimer le dernier admin !\');
</script> ';

    }

// on se met en mode edit
    if (isset($_POST['edit'])) {
        $_SESSION['modif_type'] = 'edit';
    } elseif (isset($_POST['create'])) {
        $_SESSION['modif_type'] = 'create';// sinon en création
    }

// on envois vers les pages associées en fonction du mode 
    if ($_SESSION['workspace'] == true) {
        if (isset($_SESSION['modif_type'])) {
            if ($_SESSION['modif_type'] == 'create') {
                header('Location: create_user.php');
            } elseif ($_SESSION['modif_type'] == 'delete') {
                $_SESSION['user_id_edit'] = $_POST['user_id'];
                $_SESSION['del_link'] = 'management_admin.php';
                include('function_delete_user.php');
                unset($_POST['delete']);
                unset($_POST['del_link']);
            } elseif ($_SESSION['modif_type'] == 'edit') {
                    if ($_SESSION['user_id_edit'] != NULL || !isset($_SESSION['user_id_edit'])) {
                        $_SESSION['user_id_edit'] = $_POST['user_id'];
                        header('Location: edit_user.php');
                    } else
                        $_SESSION['user_id_edit'] = "x";//pour ne pas boucler a l'infini lorqu'on 
                    $_SESSION['modif_type'] = "z";// revient sur la page de management 
            }
        }
     } else
         header('Location: index.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace by ContactMedia | Administrateurs</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<body>
    <!-- NAVIGATION -->
    <?php include('header.php') ?>
    <!-- END NAVIGATION -->
    <!-- MAIN -->
    <main>
        <!-- ASIDE -->
        <aside>
            <button id="close-btn">
                <span class="material-symbols-sharp">close</span>
            </button>

            <!-- SIDEBAR -->

            <?php
    $status_sidebar2 = "none";
                 $status_welcome = "";
    $status_admin = "active";
    $status_user = "";
             $link = "workspace_admin.php";
    $link2 = "management.php";
    $link3 = "management_admin.php";
    $link4 = "account.php";
    include('sidebar.php')?>

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
    // on affiche les admins en ligne
    include_once('function_connect.php');
    $stmt = $sql->prepare("SELECT * FROM users NATURAL JOIN roles WHERE workspace_role = '1000' ORDER BY `firstname` ASC");
    $stmt->execute();
    $users = $stmt->fetchAll();
    foreach ($users as $user) {
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
    <script src="assets/js/main.js"></script>

</body>

</html>
<?php } else
    header('Location: index.php');