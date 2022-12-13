<?php
session_start();
include('../functions/function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
<form action="" method="POST">
    <label><b>Email</b></label>
    <input type="email" value="<?php echo $email?>" name="email" disabled>
    <br>
    <label><b>Nom</b></label>
    <input type="text" value="<?php echo $lastname?>" name="lastname" disabled>
    <br>
    <label><b>Prenom</b></label>
    <input type="text" value="<?php echo $firstname?>" name="firstname" disabled>
    <br>
    <label><b>Operation</b></label>
    <input type="text" placeholder="Operation" name="operations" required>
    <br>
    <label><b>Horodatage</b></label>
    <input type="text" placeholder="Ex: Mardi 13 octobre à 17h15" name="timestamp" required>
    <br>
    <label><b>Commentaires positifs</b></label>
    <input type="text" placeholder="Entrer un commentaire" name="positive_feedback" >
    <br>
    <label><b>Commentaires negatifs</b></label>
    <input type="text" placeholder="Entrer un commentaire" name="negative_feedback" >
    <br>
    <input type="submit" id='send_form' value='Envoyer le formulaire'>
</form>
    <br><br>
    <a href="workspace_admin.php">Retour au workspace</a>
</body>
</html>
<?php
if ($_POST) {

    if ($_POST['operations'] != "" && $_POST['timestamp'] != "") {
        if (isset($_POST['operations'])) {
            include_once('../functions/function_send_form.php');
            var_dump($_POST);
            sendForm();
            header('Location: form.php');
        }
    }
}