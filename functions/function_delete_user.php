<?php 

function delUser(){
    include_once('../config/env.php');
    $_SESSION['modif_type'] ='deleted';
    $id = $_SESSION['user_id_edit'];
    $req = "DELETE FROM users where 
    id = '" . $id . "'";
    $req2 = "DELETE FROM form where 
    email_id = '" . $id . "'";
    $req3 = "DELETE FROM inventory where 
    email_id = '" . $id . "'";
    $req4 = "DELETE FROM roles where 
    email_id = '" . $id . "'";
    //$req5 = "DELETE FROM badgeuse where 
    //id = '" . $id . "'";
    mysqli_query($db, $req);
    mysqli_query($db, $req2);
    mysqli_query($db, $req3);
    mysqli_query($db, $req4);
    //$exec_req5 = mysqli_query($db, $req)5;
}
header('Location: ../admin/management.php');