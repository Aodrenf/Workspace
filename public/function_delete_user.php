<?php 
// on delete la personne dans la db, dans toutes les tables 
//où il est present ainsi que tout ce qu'il avait produit dans la db (ex: formulaire)
function delUser(){
    include('config/env.php');
    $id = $_SESSION['user_id_edit'];
    $req = "DELETE FROM users where 
    id = '" . $id . "'";
    $req2 = "DELETE FROM form where 
    email_id = '" . $id . "'";
    $req3 = "DELETE FROM inventory where 
    email_id = '" . $id . "'";
    $req4 = "DELETE FROM roles where 
    email_id = '" . $id . "'";
    $req5 = "DELETE FROM ticketing where 
    email_id = '" . $id . "'";
    //$req5 = "DELETE FROM badgeuse where 
    //id = '" . $id . "'";
    mysqli_query($db, $req);
    mysqli_query($db, $req2);
    mysqli_query($db, $req3);
    mysqli_query($db, $req4);
    mysqli_query($db, $req5);
    //$exec_req5 = mysqli_query($db, $req)5;
    $_SESSION['modif_type'] ='deleted';
}
include('function_get_user.php');
getUser($_SESSION['user_id_edit']);
$email = $_SESSION['get_email'];
$firstname = $_SESSION['get_firstname'];
$lastname = $_SESSION['get_lastname'];
$workspace_role = $_SESSION['get_workspace_role'];
$badgeuse_role = $_SESSION['get_badgeuse_role'];
$inventory_role = $_SESSION['get_inventory_role'];
$form_role = $_SESSION['get_form_role'];
$form_role = $_SESSION['get_ticketing_role'];
$email_id = $_SESSION['user_id_edit'];
delUser();
include('function_log.php');
//sendLog(initLog($email_id, $lastname, $firstname, $email, $workspace_role, $badgeuse_role, $inventory_role, $form_role));
$link = $_SESSION['del_link'];
header("Location: $link");