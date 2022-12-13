

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace by ContactMedia | Connexion</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <section>
        <!-- Image de Connexion -->
        <div class="img">
            <img src="./assets/img/bg.jpg">
        </div>
        <!-- Formulaire de Connexion -->
        <div class="content">
            <div class="form">
                <div class="logo">
                    <img src="./assets/img/logo.png">
                </div>
                <h2>Connexion Workspace</h2>
                <form action="config/conn_workspace.php" method="POST">
                    <div class="input">
                        <span>Email de Connexion</span>
                        <input type="text" name="email" placeholder="......@contactmedia.fr">
                    </div>
                    <div class="input">
                        <span>Mot de Passe</span>
                        <input type="password" name="password" placeholder="°°°°°°°°°°">
                    </div>
                    <?php
                    if(isset($_SESSION))
                    {
                        session_destroy();
                    }
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
                if ($err == 1 || $err == 2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
                    <div class="input">
                        <input type="submit" value="Connexion" name="connexion">
                    </div>
                    <div class="input">
                        <p>Reinitialisation <a href="reset_password.html"> de mot de passe ?</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
<?php session_start(); var_dump($_SESSION);
            