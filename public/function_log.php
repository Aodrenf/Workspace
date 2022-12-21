<?php 

function initLog($user_id,$lastname,$firstname,$email,$workspace_role,$badgeuse_role,$inventory_role,$form_role)
{
    if ($_SESSION['modif_type'] == 'deleted')
    {
        $dt = time();
        $date = date("l jS \of F Y h:i:s A", $dt);
        $log = "Type: delete
Id: $user_id
Nom: $lastname
Prenom:$firstname
Date: $date";
    }else if ($_SESSION['modif_type'] == 'edit' || $_SESSION['modif_type'] == 'z' )
    {
        $dt = time();
        $date = date("l jS \of F Y h:i:s A", $dt);
        $log = "Type: edit
Id: $user_id
Nom: $lastname
Prenom: $firstname
Email: $email
Role Workspace: $workspace_role
Role badgeuse: $badgeuse_role
Role inventaire: $inventory_role
Role formulaire: $form_role
Date: $date";
    }else if ($_SESSION['modif_type'] =='created')
    {
        $dt = time();
        $date = date("l jS \of F Y h:i:s A", $dt);
        $log = "Type: create
Id: $user_id
Nom: $lastname
Prenom: $firstname
Email: $email
Role Workspace: $workspace_role
Role badgeuse: $badgeuse_role
Role inventaire: $inventory_role
Role formulaire: $form_role
Date: $date";
    }
    return $log;
}

function sendLog($log)
{
    try {
        include('config/env.php');
        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // on insere dans la table log les logs
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