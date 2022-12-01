<?php
//permet d'envoyer vers la badgeuse si le user existe dans la db de la badgeuse
function workspace_to_badgeuse($SESSION)
{
  if (isset($_SESSION['email'])) {
    include('../local/conn_local_badgeuse.php'); 
    $login = $_SESSION['email'];
    $req = "SELECT count(email) FROM users where email= '" . $login . "'";
    $exec_req = mysqli_query($db, $req);
    $rep = mysqli_fetch_array($exec_req);
    $exist = $rep['count(email)'];
    if ($exist == 0) {
      echo "Vous n'existez pas dans la base de données" ;
    } else if ($exist == 1) {
      header('Location: https://beta.badgeuse.app');
      //header('Location: ../public/badgeuse.php'); //connexion a la badgeuse en local
    } else echo "erreur inconnue";
  }
}
