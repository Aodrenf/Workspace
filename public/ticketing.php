<?php
session_start();
if ($_SESSION['workspace'] == true) {
include('function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer(); echo "Bienvenue sur la zone de ticketing";
?><br><br>
<a href="wokspace_admin.php">Retour au workspace</a>
<?php } else
    header('Location: index.php');