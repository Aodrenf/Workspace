<?php
session_start();
if ($_SESSION['workspace'] == true) {
include('function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();

    include('config/status.php');
        ?>
        <html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace by ContactMedia | Dashboard</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <!-- NAVIGATION -->
    <?php include ('header.php') ?>
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
                $status_welcome = "active";
                $status_admin = "";
                $status_user = ""; 
            $link = "workspace_admin.php";
    $link2 = "management.php";
    $link3 = "management_admin.php";
    $link4 = "account.php";

    include('sidebar.php');
             
             ;?>
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
                <div target ="_blank" class="card" onclick="window.open('https:\/\/contactmedia.badgeuse.app\/')">
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="assets/img/profile_picture.png" alt="" class="right">
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
                <div class="card" onclick="location.href='conn_form.php'">
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="assets/img/profile_picture.png" alt="" class="right">
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
                        <img src="assets/img/profile_picture.png" alt="" class="right">
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
                <div style="display: <?php echo $status_ticketing ?>" onclick="location.href='../ticketing/conn_ticketing.php'" class="card">
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="assets/img/profile_picture.png" alt="" class="right">
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
    <script src="assets/js/main.js"></script>

</body>

</html>
    
<?php } else
    header('Location: index.php');   