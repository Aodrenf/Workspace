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
                <h1><span class="material-symbols-sharp">supervisor_account</span>Ticketing - Admin</h1>
            </div>
            <!-- LIST ADMIN -->
            <div class="admin-user">
                <table>
                    <thead>
                        <tr>
                        <th>Statut</th>
                            <th><a href="ticketing_in_progress.php">En cours</a></th>
                            <th><a href="ticketing_resolved.php">Résolu</a></th>
                            <th><a href="ticketing_closed.php">Clos</a></th>
                            <th><a href="ticketing_emergency.php">Urgence</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    include('function_count_ticket.php');
                    $count_in_progress = countTicketInProgress();
$count_resolved = countTicketResolved();
$count_closed = countTicketClosed();
                        $count_emergency = countTicketEmergency();
                        ?>
                         <tr>
                         <td><b><?php echo "Nombre de ticket"; ?></b></td>
                             <td><b><a href="ticketing_in_progress.php"><?php echo $count_in_progress; ?></b></td>
                             <td><a href="ticketing_resolved.php"><?php echo $count_resolved; ?></td>
                             <td><a href="ticketing_closed.php"><?php echo $count_closed; ?></td>
                             <td><a href="ticketing_emergency.php"><?php echo $count_emergency; ?></td>
                         </tr>
                       </tbody>
                </table>
            </div>

            <!-- END LIST ADMIN -->
        </section>
        <a href="create_ticket.php">create</a>
        <a href="admin_ticketing.php">partie admin</a>
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