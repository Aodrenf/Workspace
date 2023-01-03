<?php    session_start();
if ($_SESSION['workspace'] == true) {

    include('function_timer.php');
    if (!isset($_SESSION['timer'])) {
        setTimer();
    }
    ;
    timer();
    // START TICKET'S HEADER
    include('function_get_ticket.php');
    getTicket($_SESSION['ticket_id']);
    $content = $_SESSION['ticket_content'];
    $title = $_SESSION['ticket_title'];
    $applicant = $_SESSION['ticket_applicant'];

    switch($_SESSION['ticket_status'])
    {
        case 'in_progress':
            $status = 'En cours';
            break;
        case 'resolved':
            $status = 'Résolu';
            break;
    }
    switch($_SESSION['ticket_category'])
    {
        case 'other':
            $category = 'Autres';
            break;
        case 'computer_science':
            $category = 'Informatique';
            break;
        case 'network':
            $category = 'Réseau';
            break;
        case 'dev':
            $category = 'Dev';
            break;
        case 'nixxis':
            $category = 'Nixxis';
            break;
        case 'iagenda':
            $category = 'Iagenda';
            break;
        case 'nas':
            $category = 'Nas';
            break;
    }
    switch ($_SESSION['ticket_type']) {
        case 'technical_issues':
            $type = 'Problèmes techniques';
            break;
        case 'access':
            $type = 'Accès';
            break;
        case 'other':
            $type = 'Autres';
            break;
    }
    echo "-----------------------<br> - $title - $status - <br>-----------------------<br>----Informations----<br>Catégorie: $category<br>Type: $type<br>Attribué à: $applicant <br>------------------------------------------------<br> $content <br>-----------------------------------------------<br>";

    include('function_messages.php');
    message($_SESSION['ticket_id']);
}else {
    header('Location: ../public/index.php');
}