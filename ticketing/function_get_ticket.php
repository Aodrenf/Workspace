<?php

function getTicket($ticket_id)
{
    include('../public/config/env.php');
    $req = "SELECT * FROM ticketing where 
    id = '" . $ticket_id . "'";
    $exec_req = mysqli_query($db, $req);
    $rep = mysqli_fetch_array($exec_req);
    $_SESSION['ticket_content'] = $rep['content'];
    $_SESSION['ticket_category'] = $rep['category'];
    $_SESSION['ticket_priority'] = $rep['priority'];
    $_SESSION['ticket_title'] = $rep['title'];
    $_SESSION['ticket_status'] = $rep['status'];
    $_SESSION['ticket_applicant'] = $rep['applicant'];
    $_SESSION['ticket_type'] = $rep['ticket_type'];
    $_SESSION['ticket_last_modif'] = $rep['title'];
    $_SESSION['ticket_creation'] = $rep['ticket_creation'];
    $_SESSION['ticket_attribution'] = $rep['attribution'];
    $_SESSION['ticket_modif_by'] = $rep['modif_by'];
}