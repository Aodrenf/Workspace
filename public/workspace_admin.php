<?php
session_start();
include('../functions/function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
include('../config/status.php');
    
        ?>
        <html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace by ContactMedia | Dashboard</title>
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
            <div style="display: <?php echo $status_sidebar2 ?> "class="sidebar"></div>
            <div style="display: <?php echo $status_sidebar ?>;" class="sidebar">
                <a href="workspace_admin.php" class="active">
                    <span class="material-symbols-sharp">dashboard</span>
                    <h4>Accueil</h4>
                </a>
                <a href="../admin/management_admin.php">
                    <span class="material-symbols-sharp">admin_panel_settings</span>
                    <h4>Administrateurs</h4>
                </a>
                <a href="../admin/management.php">
                    <span class="material-symbols-sharp">supervisor_account</span>
                    <h4>Utilisateurs</h4>
                </a>
            </div>
            <div class="account">
                <span class="material-symbols-sharp">badge</span>
                <a href="account.php">
                    <h4>Accès Compte</h4>
                </a>
            </div>

            <!-- END SIDEBAR -->

        </aside>
        <!-- END ASIDE -->

        <!-- MIDDLE -->
        <section class="middle">
            <div class="header">
                <h1><span class="material-symbols-sharp">dashboard</span> Accueil</h1>
            </div>
            <!-- CARDS -->
            <div class="cards">
                <!-- CARD 01 -->
                <div class="card" onclick="location.href='coming_soon.php'">
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="../assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2>BADGEUSE</h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Information</small>
                            <h5>Rôle : <?php echo $badgeuse_role ?></h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">nest_clock_farsight_digital</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD 01 -->
                <!-- CARD 02 -->
                <div class="card" onclick="location.href='../config/conn_form.php'">
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="../assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2>SUIVI DES OPERATIONS</h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Information</small>
                            <h5>Rôle : <?php echo $form_role ?></h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">campaign</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD 02 -->
                <!-- CARD 03 -->
                <div style="display: <?php echo $status_inventory ?>" class="card" onclick="location.href='coming_soon.php'"> 
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="../assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2>INVENTAIRE</h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Information</small>
                            <h5>Rôle : <?php echo $inventory_role ?></h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">inventory</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD 03 -->
                <!-- CARD 04 -->
                <div style="display: <?php echo $status_ticketing ?>" onclick="location.href='coming_soon.php'" class="card">
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="../assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2>TICKETING</h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Information</small>
                            <h5>Rôle : <?php echo $ticketing_role ?></h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">support</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD 04 -->
            </div>
            <!-- END OF CARDS -->
        </section>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <!-- JS -->
    <script src="../assets/js/main.js"></script>

</body>

</html>
    
        