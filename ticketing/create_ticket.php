<?php
session_start();
if ($_SESSION['workspace'] == true) {
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_user</title>
</head>
<body>
<form action="" method="POST">
    <label><b>Titre</b></label>
    <input type="text" placeholder="Entrer votre email" name="title_ticket" required>
    <br>
    <label><b>Type</b></label>
    <select name="type_ticket" >
        <option value="incident">Incident</option>
        <option value="other">Other</option>
        <option value="idk" selected>Idk</option>
    </select>
    <br>
    <label><b>Catégorie</b></label>
    <select name="category_ticket" >
        <option value="incident" selected>cat 1</option>
        <option value="other">cat 2</option>
        <option value="idk" selected>cat 3</option>
    </select>
    <br>
    <label><b>Commentaire</b></label>
    <textarea type="text" placeholder="Expliquez votre problème" name="content_ticket" required cols="30" rows="10"></textarea>
    <br>
    <label><b>Priorité</b></label>
    <select name="priority_ticket" >
        <option value="hight">Haute</option>
        <option value="medium">Moyenne</option>
        <option value="weak" selected>Faible</option>
    </select>
    <br>
    <input type="submit" id='create_ticket' value='create_ticket'>
</form>
    <br><br>
    <a href="ticketing.php">Retour à la zone d'acceuil ticketing</a>
</body>
</html>
<?php
include('function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
// on creer une personne dans la db
if(isset($_POST['title_ticket']))
{
    include_once('function_new_ticket.php');
    newTicket();
}
} else
header('Location: index.php');