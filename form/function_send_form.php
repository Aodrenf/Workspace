<?php
function sendForm()
{
        include('config/env.php');
        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // on defini les variable a entrer dans la table form
        $email_id = $_SESSION['email_id'];
        $lastname = $_SESSION['lastname'];
        $firstname = $_SESSION['firstname'];
        $email = $_SESSION['email'];
        $type = 'form';
        $dt = time();
        $date = date("y-m-d", $dt);
        $operations = $_POST['operations'];
        $timestamp = $_POST['timestamp'];
        $positive_feedback = $_POST['positive_feedback'];
        $negative_feedback = $_POST['negative_feedback'];
        // on insere dans form le formulaire
        $sth2 = $dbco->prepare("
    INSERT INTO form (email_id, lastname, firstname, email, type, date, operations, timestamp, positive_feedback, negative_feedback)
    VALUES (:email_id, :lastname, :email, :firstname, :type, :date, :operations, :timestamp, :positive_feedback, :negative_feedback) 
  ");

        $sth2->bindParam(':email_id', $email_id);
        $sth2->bindParam(':lastname', $lastname);
        $sth2->bindParam(':firstname', $firstname);
        $sth2->bindParam(':email', $email);
        $sth2->bindParam(':type', $type);
        $sth2->bindParam(':date', $date);
        $sth2->bindParam(':operations', $operations);
        $sth2->bindParam(':timestamp', $timestamp);
        $sth2->bindParam(':positive_feedback', $positive_feedback);
        $sth2->bindParam(':negative_feedback', $negative_feedback);
        $sth2->execute();
    }
    // on envoit un mail aux managers
require('function_send_mail.php');
sendMail();