<?php 
function logConn()
{
    $user_id = $_SESSION['email_id'];
    $lastname = $_SESSION['lastname'];
    $firstname = $_SESSION['firstname'];
    $dt = time();
        $date = date("l jS \of F Y h:i:s A", $dt);
        $log = "Type: user_connected
Id: $user_id
Nom: $lastname
Prenom:$firstname
Date: $date";
    try {
        include('config/env.php');
        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // on insere dans users ce qui nous servira pour la suite
        $sth = $dbco->prepare("
    INSERT INTO log (log)
    VALUES (:log) 
  ");
        $sth->bindParam(':log', $log);
        $sth->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }
}