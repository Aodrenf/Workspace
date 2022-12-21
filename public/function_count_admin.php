<?php
// on compte le nombre d'admin dans la db , cela sert à verifier si il est 
//le dernier admin pour éviter de se delete ou de s'edit 
function countAdmin()
{
    include('config/env.php');
    $requete = "SELECT count(*) FROM users NATURAL JOIN roles where 
    workspace_role = '1000'";
    $exec_requete = mysqli_query($db, $requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    return $count;
}
$_SESSION['count'] = countAdmin();