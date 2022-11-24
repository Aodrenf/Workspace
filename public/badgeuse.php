<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body style='background:#fff;'>
    <div id="content">

        <?php

        session_start();
        $user = $_SESSION['name'];
        echo "Bonjour $user, bienvenue sur la badgeuse";
        ?>