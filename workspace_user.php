<html>
 <head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 </head>
 <body style='background:#fff;'>
 <div id="content">
 <!-- tester si l'utilisateur est connecté -->
 <?php
 header('Access-Control-Allow-Origin: *');
 session_start();
 if($_SESSION['email'] !== ""){
 $user = $_SESSION['name'];
 }
 include_once 'functions.php';
 $SESSION = $_SESSION;
 ?>
<br><br>
<h2>Bienvenue<?php $user ?></h2>
<a href="conn_badgeuse.php">liens vers la badgeuse</a>
