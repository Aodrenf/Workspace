<?php
//permet d'envoyer vers la badgeuse si le user existe dans la db de la badgeuse
function cors($SESSION)
{
  if (isset($_SESSION['email'])) {

    //include('../config/conn_local_bageuse.php');
    include('../config/conn_db.php');
    $login = $_SESSION['email'];
    $req = "SELECT count(email) FROM users where email= '" . $login . "'";
    $exec_req = mysqli_query($db, $req);
    $rep = mysqli_fetch_array($exec_req);
    $exist = $rep['count(email)'];
    if ($exist == 0) {
      echo "Vous n'existez pas dans la base de données";
    } else if ($exist == 1) {
      header('Location: https://contactmedia.badgeuse.app');
    } else echo "erreur inconnue";
  }
}
