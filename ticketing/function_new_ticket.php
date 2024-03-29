<?php

function newTicket()
{
    $type = 'ticket';
    $email_id = $_SESSION['email_id'];
    $category = $_POST['category_ticket'];
    $priority = $_POST['priority_ticket'];
    $title = $_POST['title_ticket'];
    $content = $_POST['content_ticket'];
    $semaine = array(" Dimanche "," Lundi "," Mardi "," Mercredi "," Jeudi ",
" vendredi "," samedi ");
$mois =array(1=>" janvier "," février "," mars "," avril "," mai "," juin ",
" juillet "," août "," septembre "," octobre "," novembre "," décembre ");

    $dt = time();
    //$date = date("y-m-d", $dt);
  $last_modif = $semaine[date('w',$dt)] . " " . date('j',$dt) . " " . $mois[date('n',$dt)] . " " . date('Y',$dt) . " " . date('H:i:s',$dt);
    $ticket_type = $_POST['type_ticket'];
    $attribution = '/'; // a revoir
    $statut = "in_progress";
    $applicant = $_SESSION['lastname'];
    $dt = time();
    $ticket_creation = date("y-m-d", $dt);
    $modif_by = '/';
    
    try {
        include('../public/config/env.php');
        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // on insere dans users ce qui nous servira pour la suite
        $sth = $dbco->prepare("
    INSERT INTO ticketing (type, email_id, category, priority, title, content, status, applicant, ticket_type, last_modif, ticket_creation, attribution, modif_by)
    VALUES (:type, :email_id, :category, :priority, :title, :content, :status, :applicant, :ticket_type, :last_modif, :ticket_creation, :attribution, :modif_by) 
  ");
        $sth->bindParam(':type', $type);
        $sth->bindParam(':email_id', $email_id);
        $sth->bindParam(':category', $category);
        $sth->bindParam(':priority', $priority);
        $sth->bindParam(':title', $title);
        $sth->bindParam(':content', $content);
        $sth->bindParam(':status', $statut);
        $sth->bindParam(':applicant', $applicant);
        $sth->bindParam(':ticket_type', $ticket_type);
        $sth->bindParam(':last_modif', $last_modif);
        $sth->bindParam(':ticket_creation', $ticket_creation);
        $sth->bindParam(':attribution', $attribution);
        $sth->bindParam(':modif_by', $modif_by);
        $sth->execute();
      $var = '<script language=javascript>
      alert(\'Votre ticket a bien été créer, nous y répondrons dans les plus brefs delais \');
   </script> ';
      } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }
    return $var;
}