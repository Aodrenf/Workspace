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
    if (isset($_POST)) {
        if (isset($_POST['clos'])) {
            $_SESSION['ticket_id'] = $_POST['user_id'];
            include('function_closing_ticket.php');
            $ticket_id = $_SESSION['ticket_id'];
            closeTicket($ticket_id);
        } else if (isset($_POST['chat'])) {
            $_SESSION['ticket_id'] = $_POST['user_id'];
            header('Location: chat.php');
        }
        else{}
    }
    ?>
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
                <h1><span class="material-symbols-sharp">supervisor_account</span>Ticketing - Urgence</h1>
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
    $stmt = $sql->prepare("SELECT * FROM ticketing WHERE priority = 'emergency' ORDER BY `id` DESC");
    $stmt->execute();
    $tickets = $stmt->fetchAll();
    foreach ($tickets as $ticket) {
        include('ticketing_display.php');
        ?>
         <tr>
         <td><b><?php echo $ticket['id']; ?></b></td>
             <td><?php echo $ticket['title']; ?></td>
             <td><?php echo $status_display ?></td>
             <td><?php echo $ticket_applicant; ?></td>
             <td><?php echo $ticket['last_modif']; ?></td>
             <td><?php echo $ticket['ticket_creation']; ?></td>
             <td><?php echo $ticket_priority; ?></td>
             <td><?php echo $ticket_attribution; ?></td>
             <td><?php echo $ticket_modif_by; ?></td>
                             
                             <td>
                             <form method="post">
                             <input type="hidden" name="user_id" value="<?php echo $ticket['id']; ?>">
                              <button style="display: <?php echo $display_btn1 ?>;" type="submit" name="chat" class="material-symbols-outlined secondary">chat</button>
                             </form>
                             <form onsubmit="return confirm('Êtes-vous sûr de vouloir clore ce ticket ?')" action="" method="post">
                                 <input type="hidden" name="user_id" value="<?php echo $ticket['id']; ?>">
                                 <button style="display: <?php echo $display_btn2 ?>;" type="submit" name="clos" class="material-symbols-outlined danger">delete</button>
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
        <a href="create_ticket.php">Création d'un ticket</a>
        <a href="my_tickets.php">Mes tickets</a>
        <a style="display: <?php echo $status_ticketing_admin ?>;" href="admin_ticketing.php">partie admin</a>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <!-- JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>
<?php
 } else
    header('Location: ../public/index.php');