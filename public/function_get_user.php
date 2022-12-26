<?php
// on recupère les coordonnées de la personne dans la db grace a son email id
function getUser($email_id)
{
        include('config/env.php');
        $req = "SELECT * FROM users where 
        id = '" . $email_id . "'";
        $exec_req = mysqli_query($db, $req);
        $rep = mysqli_fetch_array($exec_req);
        //pour les roles
        $req2 = "SELECT * FROM roles where 
        id = '" . $email_id . "'";
        $exec_req2 = mysqli_query($db, $req2);
        $rep2 = mysqli_fetch_array($exec_req2);
        $_SESSION['get_firstname'] = $rep['firstname'];
        $_SESSION['get_lastname'] = $rep['lastname'];
        $_SESSION['get_email'] = $rep['email'];
        $_SESSION['get_badgeuse_role'] = $rep2['badgeuse_role'];
        $_SESSION['get_inventory_role'] = $rep2['inventory_role'];
        $_SESSION['get_form_role'] = $rep2['form_role'];
        $_SESSION['get_workspace_role'] = $rep2['workspace_role'];
        $_SESSION['get_ticketing_role'] = $rep2['ticketing_role'];

}