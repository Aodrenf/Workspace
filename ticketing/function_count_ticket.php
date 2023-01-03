<?php
 function countTicketInProgress()
{
    include('../public/config/env.php');
    $requete2 = "SELECT count(*) FROM ticketing where 
    status = 'in_progress'";
    $exec_requete2 = mysqli_query($db, $requete2);
    $reponse2 = mysqli_fetch_array($exec_requete2);
    $count2 = $reponse2['count(*)'];
    return $count2;
}
function countTicketResolved()
{
    include('../public/config/env.php');
    $requete2 = "SELECT count(*) FROM ticketing where 
    status = 'resolved'";
    $exec_requete2 = mysqli_query($db, $requete2);
    $reponse2 = mysqli_fetch_array($exec_requete2);
    $count2 = $reponse2['count(*)'];
    return $count2;
}
function countTicketClosed()
{
    include('../public/config/env.php');
    $requete3 = "SELECT count(*) FROM ticketing where 
    status = 'closed'";
    $exec_requete3 = mysqli_query($db, $requete3);
    $reponse3 = mysqli_fetch_array($exec_requete3);
    $count3 = $reponse3['count(*)'];
    return $count3;
}

function countTicketEmergency()
{
    include('../public/config/env.php');
    $requete4 = "SELECT count(*) FROM ticketing where 
    priority = 'emergency'";
    $exec_requete4 = mysqli_query($db, $requete4);
    $reponse4 = mysqli_fetch_array($exec_requete4);
    $count4 = $reponse4['count(*)'];
    return $count4;
}
