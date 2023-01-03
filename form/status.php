<?php
//
// On defini ici l'affichage des coordonnées rattachées aux personnes
//

// mettre a jour les coordonnées si l'admin vient de s'auto-edit
if(isset($_SESSION['edit_self_firstname']))
{
    $firstname = $_SESSION['edit_self_firstname'];
    $lastname = $_SESSION['edit_self_lastname'];
    $workspace_role = $_SESSION['edit_self_workspace_role'];
    $form_role = $_SESSION['edit_self_form_role'];
    $badgeuse_role = $_SESSION['edit_self_badgeuse_role'];
    $inventory_role = $_SESSION['edit_self_inventory_role'];
}else{
    $firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$workspace_role = $_SESSION['workspace_role'];
$form_role = $_SESSION['form_role'];
$badgeuse_role = $_SESSION['badgeuse_role'];
$inventory_role = $_SESSION['inventory_role'];
}


if ($workspace_role == 1000 || $workspace_role == 'Admin')
{
    $workspace_role = 'Admin';
    $status_sidebar = 'true';
    $status_sidebar2 = 'none';
    $status_modif_info = "";
    $status_sidebar_admin = "true";
}
else if ($workspace_role == 3 || $workspace_role == 'Responsable')
{
    $workspace_role = 'Responsable';
    $status_sidebar = 'true';
    $status_sidebar2 = 'none';
    $ticketing_role = 'Utilisateur';
    $status_modif_info = "";
    $status_sidebar_admin = "none";
}
else
{
    $workspace_role = 'Utilisateur';
    $status_sidebar = 'none';
    $status_sidebar2 = 'true';
    $status_modif_info = "disabled  ";

}

if ($badgeuse_role == 1000 || $badgeuse_role == 'Admin')
    $badgeuse_role = 'Admin';
else if ($badgeuse_role == 2 || $badgeuse_role == 'Manager')
    $badgeuse_role = 'Manager';
else if ($badgeuse_role == 3 || $badgeuse_role == 'Responsable')
    $badgeuse_role = 'Responsable';
else
    $badgeuse_role = 'Utilisateur';

if ($inventory_role == 1000 || $inventory_role == 'Admin') {
    $inventory_role = 'Admin';
    $status_inventory = 'true';
}elseif($inventory_role == 0 || $inventory_role == 'NULL')
{
    $inventory_role = 'NULL';
    $status_inventory = 'none';
}elseif($inventory_role == 1 || $inventory_role == 'Utilisateur')
{
    $inventory_role = 'Utilisateur';
    $status_inventory = 'true';
}
else
{
    $inventory_role = 'NULL';
    $status_inventory = 'none';
}
    
if ($form_role == 1000 || $form_role == 'Admin')
    $form_role = 'Admin';
else
    $form_role = 'Utilisateur';