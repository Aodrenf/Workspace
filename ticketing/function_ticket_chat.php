<?php

function sendMessage($ticket_id, $content, $email_id)
{
    $dt = time();
    //$date = date("y-m-d", $dt);
    $date = date('l jS \of F Y h:i:s A', $dt) ;
    try {
        include('../public/config/env.php');
        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // on insere dans users ce qui nous servira pour la suite
        $sth = $dbco->prepare("
    INSERT INTO messages (ticket_id, content, date, email_id)
    VALUES (:ticket_id, :content, :date, :email_id) 
  ");
        $sth->bindParam(':ticket_id', $ticket_id);
        $sth->bindParam(':content', $content);
        $sth->bindParam(':date', $date); 
        $sth->bindParam(':email_id', $email_id);
        $sth->execute();
      $_SESSION['message_send'] = true;
      } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }
}

function modifBy($ticket_id, $email_id)
{
  try {
    include('../public/config/env.php');
    $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // on insere dans users ce qui nous servira pour la suite
    $dt = time(); 
    $last_modif = date('l jS \of F Y h:i:s A', $dt) ;
    $sth2 = $dbco->prepare("
                  UPDATE ticketing
                  SET last_modif = '$last_modif'
                  WHERE id='$ticket_id'
                ");
            $sth2->execute();

    $sth2->bindParam(':last_modif', $last_modif);

    $sth3 = $dbco->prepare("
                  UPDATE ticketing
                  SET modif_by = '$email_id'
                  WHERE id='$ticket_id'
                ");
            $sth3->execute();

    $sth2->bindParam(':last_modif', $last_modif);
    $sth3->bindParam(':modif_by', $email_id);
    $sth2->execute();
  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
  }
}

function ticketAttribution($ticket_id, $email_id)
{
  if ($_SESSION['ticketing_role'] == 1000 && ($_SESSION['ticket_attribution'] == 0 or $_SESSION['ticket_attribution'] == '/'))
  {
    $attribution = $email_id;
    try {
      include('../public/config/env.php');
      $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sth4 = $dbco->prepare("
                    UPDATE ticketing
                    SET attribution = '$attribution'
                    WHERE id='$ticket_id'
                  ");
              $sth4->execute();
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  }
}