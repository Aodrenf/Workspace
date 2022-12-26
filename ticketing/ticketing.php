<?php
session_start();
if ($_SESSION['workspace'] == true) {
include('function_timer.php');
include('status.php');
    include_once('function_timer.php');
    if (!isset($_SESSION['timer'])) {
        setTimer();
    }
    timer();
    //cf management_admin.php
    if (isset($_POST['delete'])) {
        $_SESSION['modif_type'] = 'delete';
    } elseif (isset($_POST['edit'])) {
        $_SESSION['modif_type'] = 'edit';
    } elseif (isset($_POST['create'])) {
        $_SESSION['modif_type'] = 'create';
    }

//cf management_admin.php
    if ($_SESSION['workspace'] == true) {
        if (isset($_SESSION['modif_type'])) {
            if ($_SESSION['modif_type'] == 'create') {
                header('Location: create_user.php');
            } elseif ($_SESSION['modif_type'] == 'delete') {
                $_SESSION['user_id_edit'] = $_POST['user_id'];
                $_SESSION['del_link'] = 'management.php'; // pour savoir de qu'elle page on viens pour le redirect dans delete_user.php
                include('function_delete_user.php');
                unset($_POST['delete']);
                unset($_POST['del_link']);
            } elseif ($_SESSION['modif_type'] == 'edit') {
                    if ($_SESSION['user_id_edit'] != NULL || !isset($_SESSION['user_id_edit'])) {
                        $_SESSION['user_id_edit'] = $_POST['user_id'];
                        header('Location: edit_user.php');
                    } else
                        $_SESSION['user_id_edit'] = "x";
                    $_SESSION['modif_type'] = "z";
            }
        }
    } else
        header('Location: ../public/index.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace by ContactMedia | Ticketing </title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<body>
    <!-- NAVIGATION -->
    <?php  include('header.php') ?>
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
    $status_welcome = "";
    $status_admin = "";
    $status_user = "";         
    $link = "../public/workspace_admin.php";
    $link2 = "../public/management.php";
    $link3 = "../public/management_admin.php";
    $link4 = "../public/account.php";
    include('sidebar.php')?>
            <!-- END SIDEBAR -->

        </aside>
        <!-- END ASIDE -->

        <!-- MIDDLE -->
        <section class="middle">
            <div class="header">
                <h1><span class="material-symbols-sharp">supervisor_account</span> Accueil - Ticketing</h1>
            </div>
            <!-- LIST ADMIN -->
            <div class="admin-user">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Statut</th>
                            <th>Demandeur</th>
                            <th>Dernière modif</th>
                            <th>Date de création</th>
                            <th>Priorité</th>
                            <th>Attribution</th>
                            <th>Modifié par -</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

    include_once('function_connect.php');
    $stmt = $sql->prepare("SELECT * FROM ticketing WHERE status = 'in_progress' or status ='closed' ORDER BY `id` ASC");
    $stmt->execute();
    $tickets = $stmt->fetchAll();
    foreach ($tickets as $ticket) {
                        ?>
                         <tr>
                             <td><b><?php echo $ticket['id']; ?></b></td>
                             <td><?php echo $ticket['title']; ?></td>
                             <td><?php echo $ticket['status']; ?></td>
                             <td><?php echo $ticket['applicant']; ?></td>
                             <td><?php echo $ticket['last_modif']; ?></td>
                             <td><?php echo $ticket['ticket_creation']; ?></td>
                             <td><?php echo $ticket['priority']; ?></td>
                             <td><?php echo $ticket['attribution']; ?></td>
                             <td><?php echo $ticket['modif_by']; ?></td>
                             
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
        <a href="create_ticket.php">create</a>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <!-- JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>
<?php } else
    header('Location: ../public/index.php');