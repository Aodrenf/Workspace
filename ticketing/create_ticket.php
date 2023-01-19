<?php
session_start();
if ($_SESSION['workspace'] == true) {
    if (isset($_SESSION['ticket_edit']))
    {
        header('Location: ticketing.php');
    }
    include('status.php');
    include('function_timer.php');
    if (!isset($_SESSION['timer'])) {
        setTimer();
    }
    ;
    timer();
    ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace by ContactMedia | Ticketing </title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<body>
    <!-- NAVIGATION -->
    <?php  include('header.php') ?>
    <!-- END NAVIGATION -->
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
    $link = "../public/workspace_admin.php";
    $link2 = "../public/management.php";
    $link3 = "../public/management_admin.php";
    $link4 = "../public/account.php";
    include('sidebar.php')?>
            <!-- END SIDEBAR -->

        </aside>
        <!-- END ASIDE -->

        <!-- MIDDLE -->
        <section class="middle">
            <div class="header">
                <h1><span class="material-symbols-sharp">supervisor_account</span> Ticketing - Création d'un nouveau ticket</h1>
            </div>
            <!-- LIST ADMIN -->
            <div class="admin-user">
<form action="" method="POST">
    <label><b>Titre</b></label>
    <input type="text" placeholder="Entrer le titre" name="title_ticket" required>
    <br>
<div>
	<label for="type">Type : </label>
	<select id="type" name="type_ticket" size="1" onChange="THEFUNCTION(this.selectedIndex);">
    <option value="technical_issues">Problèmes techniques</option>
        <option value="access">Accès</option>
        <option value="other">Autres</option>
		</select>
</div>
<div style="display:'';" id="info">
<label><b>Catégorie</b></label>
    <select name="category_ticket">
        <option value="computer_science">Informatique</option>
        <option value="network">Réseau</option>
        <option value="dev">Dev</option>
    </select>
    </div>
    <div style="display:none;" id="prod">
<label><b>Catégorie</b></label>
    <select name="category_ticket">
        <option value="email">Email</option>
        <option value="nas">Nas</option>
        <option value="iagenda">Iagenda</option>
        <option value="nixxis">Nixxis</option>
    </select>
    </div>
    <div style="display:none;" id="other">
<label><b>Catégorie</b></label>
    <select name="category_ticket">
        <option value="other">Autres</option>
    </select>
    </div>
</div>
<script type="text/javascript">
	function THEFUNCTION(i) {
		var info = document.getElementById('info');
        var prod = document.getElementById('prod');
        var other = document.getElementById('other');
		switch(i) {
			case 0 : info.style.display = ''; prod.style.display = 'none'; other.style.display ='none'; break;
            case 1 : prod.style.display = ''; info.style.display = 'none'; other.style.display ='none'; break;
            case 2 : other.style.display = ''; info.style.display = 'none'; prod.style.display ='none'; break;
			default: info.style.display = 'none'; prod.style.display = 'none'; other.style.display ='none';  break;
		}
	}
</script>
    <br>
    <label><b>Commentaire</b></label>
    <textarea type="text" placeholder="Expliquez votre problème" name="content_ticket" required cols="80" rows="10"></textarea>
    <br>
    <label><b>Priorité</b></label>
    <select name="priority_ticket" >
        <option value="emergency">Urgence</option>
        <option value="hight">Haute</option>
        <option value="medium">Moyenne</option>
        <option value="low" selected>Faible</option>
    </select>
    <br>
    <input type="submit" id='create_ticket' value='create_ticket'>
</form>
</div>

            <!-- END LIST ADMIN -->
        </section>
        <a href="my_tickets.php">Mes tickets</a>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <!-- JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>
<?php
// on creer une personne dans la db
if(isset($_POST['title_ticket']))
{
    include('function_new_ticket.php');
    echo newTicket();
}
} else
header('Location: index.php');