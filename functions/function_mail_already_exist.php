<?php

function email_already_exist($email)
{
    include('../config/env.php');
    $requete = "SELECT count(*) FROM users where 
    email = '" . $email . "'";
    $exec_requete = mysqli_query($db, $requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    if($count >= 1) 
    return true;
    else return false;
}