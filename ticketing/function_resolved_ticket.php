<?php
function resolvedTicket($ticket_id)
{
    try {
        include('../public/config/env.php');
        $servername = 'localhost';
        $dbName = 'workspace';
        $username = "root";
        $password = "";
        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sth = $dbco->prepare("
                UPDATE ticketing
                SET status = 'resolved'
                WHERE id='$ticket_id'
              ");
          $sth->execute();
          
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }
}