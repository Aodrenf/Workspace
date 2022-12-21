<?php
session_start();
//envois du formulaire
if ($_SESSION['workspace'] == true) {
  if ($_POST) {
    if (isset($_POST['operations'])){
        if ($_POST['operations'] != "" && $_POST['timestamp'] != "") {
            include_once('function_send_form.php');
            sendForm();
            header('Location: form.php');
        }
    }
}
//la déconnexion automatique si Δt > 10min
include('function_timer.php');
if(!isset($_SESSION['timer']))
{
    setTimer();
};
timer();
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <!-- FONT & CAROUSEL CSS -->
  <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Suivi Opérations by ContactMedia</title>
</head>
<body>  
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('assets/images/bg.jpg');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 py-5">
            <h3 class="mb-4"><span class="material-symbols-outlined">breaking_news_alt_1</span> Formulaire - Suivi Opérations</h3>
            <form action="#" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="fname">Nom</label>
                    <fieldset disabled><input type="text" class="form-control" value="<?php echo $_SESSION['lastname'] ?>" id="fname" disabled></fieldset>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="lname">Prénom</label>
                    <fieldset disabled><input type="text" class="form-control" value="<?php echo $_SESSION['firstname'] ?>" id="lname" disabled>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="email">Email</label>
                    <fieldset disabled><input type="email" class="form-control" value="<?php echo $_SESSION['email'] ?>" disabled
                        id="email"></fieldset>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="lname">Date & Heure de Production</label>
                    <input name="timestamp" type="text" class="form-control" placeholder="Le 01/01/2023 de 14:00 à 16:00" id="lname" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="lname">Opération</label>
                    <input name="operations" type="text" class="form-control" placeholder="Abeille Caen" id="lname" required>
                  </div>
                </div>
              </div>
              <div class="form-floating mt-3">
                <label for="floatingTextarea">Commentaire :</label>
                <textarea name="negative_feedback" class="form-control" placeholder="Commentaire" id="floatingTextarea"></textarea>
              </div>
              <div class="form-floating mt-3">
                <label for="floatingTextarea">Points Positif :</label>
                <textarea name="positive_feedback" class="form-control" placeholder="Points Positif" id="floatingTextarea"></textarea>
              </div>
              <div class="d-flex mb-5 mt-4 align-items-center">
                <input type="submit" value="Envoyer" id="send_form" class="btn px-5 m-2 btn-primary">
                <button style="text-decoration : none;" type="#" value="retour au workspace" id="btn" class="btn px-5 m-5 btn-outline-primary"><a href="../public/workspace_admin.php">Revenir au workspace</a></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- JS -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
<?php
//redirect si pas connecté au workspace
} else
header('Location: index.php');