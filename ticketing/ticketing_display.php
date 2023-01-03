<?php

$ticket_modif_by = $ticket['modif_by'];
$ticket_attribution = $ticket['attribution'];
$ticket_applicant = $ticket['applicant'];


// ticket_status 
if ($ticket['status'] == 'in_progress')
{
    $status_display = 'En cours';
    $display_btn1 = 'true';
    $display_btn2 = 'true';

}
if ($ticket['status'] == 'resolved')
{
    $status_display = 'Résolu';
    $display_btn1 = 'true';
    $display_btn2 = 'true';

}
if ($_SESSION['ticketing_role'] == 1000 || $_SESSION['ticketing_role'] == 'Admin' || isset($_SESSION['edit_self_ticketing_role']) == '1000')
{
    $display_btn2 = 'true';
}else $display_btn2 = 'none';
if ($ticket['status'] == 'closed')
{
    $status_display = 'Fermé';
    $display_btn1 = 'none';
    $display_btn2 = 'none';

}


if (isset($ticket['modif_by']) && $ticket['modif_by'] != '/')
{
    include('../public/config/env.php');
    $requete = "SELECT * FROM users where
    id = $ticket_modif_by";
    $exec_requete = mysqli_query($db, $requete);
    $rep = mysqli_fetch_array($exec_requete);
    if (isset($rep['firstname']))
    {
        $ticket_modif_by = $rep['firstname'];
    }else $ticket_modif_by = '/';
}

if (isset($ticket['priority']))
{
    if ($ticket['priority'] == 'low')
        $ticket_priority = 'Faible';
        else if ($ticket['priority'] == 'medium')
        $ticket_priority = 'Moyenne';
        else if ($ticket['priority'] == 'hight')
        $ticket_priority = 'Elevée';
        else if ($ticket['priority'] == 'emergency')
        $ticket_priority = 'URGENCE';
}

if (isset($ticket['attribution']) && $ticket['attribution'] != '/')
{
    include('../public/config/env.php');
    $requete = "SELECT * FROM users where
    id = $ticket_attribution";
    $exec_requete = mysqli_query($db, $requete);
    $rep = mysqli_fetch_array($exec_requete);
     if (isset($rep['firstname'])) $ticket_attribution = $rep['firstname'];
    else $ticket_attribution = '/';
}