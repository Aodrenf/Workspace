<?php
session_start();
// on récupere les coordonnées de la personne 
if ($_SESSION['workspace'] == true) {
    include('function_timer.php');
    include('config/status.php');
    include_once('function_get_user.php');
    getUser($_SESSION['email_id']);
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
// si la personne s'edit 
if(isset($_POST['firstname']))
{
    include('function_edit_user.php');
    $_SESSION['user_id_edit'] = $_SESSION['email_id'];
    editUser();
    getUser($_SESSION['email_id']);
    $_SESSION['edit_self'] = true;
    $_SESSION['edit_self_firstname'] = $_SESSION['get_firstname'];
    $_SESSION['edit_self_lastname'] = $_SESSION['get_lastname'];
    $_SESSION['edit_self_workspace_role'] = $_SESSION['get_workspace_role'];
    $_SESSION['edit_self_badgeuse_role'] = $_SESSION['get_badgeuse_role'];
    $_SESSION['edit_self_form_role'] = $_SESSION['get_form_role'];
    $_SESSION['edit_self_inventory_role'] = $_SESSION['get_inventory_role'];
    $_SESSION['edit_self_email'] = $_SESSION['get_email'];
        
}

// affichage du role pour le header
$role = $_SESSION['workspace_role'];

if ($role == 1000 || $role == 'Admin')
    $role_display = 'Admin';
else if ($role == 3 || $role == 'Responsable')
    $role_display = 'Responsable';
else
    $role_display = 'Utilisateur';
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();

//si la personne modifie on verifie son mdp et le mdp confirm
    if (isset($_POST['password'])) {
        if ($_POST['password'] == $_POST['verif']) {
            $email_id = $_SESSION['email_id'];
            include('function_hash.php');
            $pwd = hash_pwd($_POST['password']);
            if ($pwd != "a491d410622c465a199a26895f0dbaf28272837d5bb4b6973126c30f25ba5db3") {
                include('config/env.php');
                $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //On modifie le password dans users du workspace
                $sth4 = $dbco->prepare("
              UPDATE users
              SET password = '$pwd'
              WHERE id='$email_id'
            ");
                $sth4->execute();
                // on modifie le pwd dans la table form
                $sth2_3 = $dbco->prepare("
                  UPDATE form
                  SET password = '$pwd'
                  WHERE email_id='$email_id'
                ");
                $sth2_3->execute();

                // on modifie le password dans la table inventaire
                $sth4_2 = $dbco->prepare("
                UPDATE inventory
                SET password = '$pwd'
                WHERE email_id='$email_id'
              ");
                $sth4_2->execute();

                // on modifie le password dans la table badgeuse
                //   $sth = $dbco->prepare("
                //     UPDATE badgeuse
                //     SET email = '$email'
                //     WHERE email_id='$email_id'
                // ");
                //$sth->execute();
            }
        } else {
            $err = true;
        }
    }

            ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace by ContactMedia | Gestion de Compte</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    </head>

<body>
<?php include('header.php')?>
    <!-- MAIN -->
    <main>
        <!-- ASIDE -->
        <aside>
            <button id="close-btn">
                <span class="material-symbols-sharp">close</span>
            </button>

            <!-- SIDEBAR -->
            <?php
                $status_welcome = "";
                $status_admin = "";
                $status_user = "";
                 $link = "workspace_admin.php";
    $link2 = "management.php";
    $link3 = "management_admin.php";
    $link4 = "account.php";
    include('sidebar.php')?>
            <!-- END SIDEBAR -->
        </aside>
        <!-- END ASIDE -->
        <!-- MIDDLE -->
        <section class="middle">
            <div class="header">
                <h1><span class="material-symbols-sharp">badge</span> Gestion de votre Compte</h1>
            </div>
            <!-- CARDS -->
            <div class="cards">
                <!-- CARD 01 -->
                <div class="card-settings">
                    <div class="top">
                        <div class="left">
                            <h2>Informations :</h2>
                        </div>
                        <span class="material-symbols-sharp right">contacts</span>
                    </div>
                    <form method="post">
                    <div class="middle">
                        <h4>Nom : <input type="text" name="lastname" class="form-control" id="floatingTextarea" value="<?php echo $_SESSION['get_lastname'];?>" <?php echo $status_modif_info?>>
                        <br><br>
                        Prénom : <input type="text" name="firstname" class="form-control" id="floatingTextarea" value="<?php echo $_SESSION['get_firstname']?>" <?php echo $status_modif_info?>>
                        <br><br>
                        Email : <input type="email" placeholder="Entrer votre email" name="email" class="form-control" id="floatingTextarea" value="<?php echo $_SESSION['get_email'];?>" <?php echo $status_modif_info?>>
                    </h4>
                    </div>

                    <div class="bottom">
                        <div class="left">
                            <h5>Rôle : <?php echo $role_display?></h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <button type="submit" name="edit" class="material-symbols-sharp" style="color: var(--color-secondary);">save</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <!-- END OF CARD 01 -->
                <!-- CARD 02 -->
                <div class="card-settings">
                    <div class="top">
                        <div class="left">
                            <h2>Mot de Passe :</h2>
                        </div>
                        <span class="material-symbols-sharp right">password</span>
                    </div>
                    <div class="middle">
                        <form method="post"><h4>Nouveau mot de Passe :<br><input placeholder="°°°°°°°°°°" type="password" class="form-control"
                                id="inputPassword" name="password"><br><br>Confirmation de votre mot de passe :<br><input
                                type="password" class="form-control" id="inputPassword" placeholder="°°°°°°°°°°" name="verif"></h4>
                                <?php if(isset($err)) echo "<p style='color:red'>Les mots de passe sont différents</p>" ?>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <h5 style="color: #e23232;">Ne communiquez <b>JAMAIS</b> votre mot de passe</h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <button type="submit" class="material-symbols-sharp" style="color: var(--color-secondary);">save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD 02 -->
            </div>
            <!-- END OF CARDS -->
        </section>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <!-- JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>
<?php
} else
header('Location: index.php');