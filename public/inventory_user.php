<?php echo "Bienvenue sur l'inventaire User";
var_dump($_SESSION);
if (isset($_GET['erreur'])) {
    $err = $_GET['erreur'];
    if ($err == 1 || $err == 2)
    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
}