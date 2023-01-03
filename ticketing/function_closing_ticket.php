<?php
function closeTicket($ticket_id)
{
    try {
        include('../public/config/env.php');
        $servername = 'localhost';
        $dbName = 'workspace';
        $username = "root";
        $password = "";
        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //On prépare la requête et on l'exécute
        //On modifie le prenom dans le table users du workspace
          $sth = $dbco->prepare("
                UPDATE ticketing
                SET status = 'closed'
                WHERE id='$ticket_id'
              ");
          $sth->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }
}
