<?php
// permet de verifier si un mail existe dans la db pour ne pas le créer en double
// lorsqu'on créer ou qu'on edit
function email_already_exist($email)
{
    include('config/env.php');
    $requete = "SELECT count(*) FROM users where 
    email = '" . $email . "'";
    $exec_requete = mysqli_query($db, $requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    if($count >= 1) 
    return true;
    else return false;
}