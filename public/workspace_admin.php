<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body style='background:#fff;'>
    <div id="content">

        <?php
        header('Access-Control-Allow-Origin: *');
        session_start();
        if ($_SESSION['email'] !== "") {
            $user = $_SESSION['name'];
        }
        ?>
        <br><br>
        <h2>Bienvenue<?php echo " $user" ?></h2>
        <br>
        <a href="../config/conn_badgeuse.php">liens vers la badgeuse</a>
        <br><br>
        <a href="../config/conn_inventory.php">lien versl'inventaire</a>
    
        