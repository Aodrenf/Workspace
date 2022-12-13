<?php
function countAdmin()
{
    include('../config/env.php');
    $requete = "SELECT count(*) FROM users NATURAL JOIN roles where 
    workspace_role = '1000'";
    $exec_requete = mysqli_query($db, $requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    return $count;
}
$_SESSION['count'] = countAdmin();