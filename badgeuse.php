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
include_once 'functions.php';
 session_start();
 // afficher un message
 echo "Bonjour $user, bienvenue sur la badgeuse";
var_dump($_COOKIE);
var_dump($_SESSION);
 ?>