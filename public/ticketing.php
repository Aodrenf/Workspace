<?php
session_start();
include('../functions/function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer(); echo "Bienvenue sur la zone de ticketing";
?><br><br>
<a href="wokspace_admin.php">Retour au workspace</a>