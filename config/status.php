<?php
if(isset($_SESSION['edit_self']))
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


if ($workspace_role == 1000)
{
    $workspace_role = 'Admin';
    $status_ticketing = 'true';
    $status_sidebar = 'true';
    $status_sidebar2 = 'none';
    $ticketing_role = 'Admin';
}
else if ($workspace_role == 3)
{
    $workspace_role = 'Responsable';
    $status_ticketing = 'true';
    $status_sidebar = 'true';
    $status_sidebar2 = 'none';
    $ticketing_role = 'Utilisateur';
}
else
{
    $workspace_role = 'Utilisateur';
    $status_ticketing = 'none';
    $status_sidebar = 'none';
    $status_sidebar2 = 'true';
    $ticketing_role = 'Utilisateur';
}

if ($badgeuse_role == 1000)
    $badgeuse_role = 'Admin';
else if ($badgeuse_role == 2)
    $badgeuse_role = 'Responsable';
else if ($badgeuse_role == 3)
    $badgeuse_role = 'Manager';
else
    $badgeuse_role = 'Utilisateur';

if ($inventory_role == 1000) {
    $inventory_role = 'Admin';
    $status_inventory = 'true';
}elseif($inventory_role == 0)
{
    $inventory_role = 'NULL';
    $status_inventory = 'none';
}elseif($inventory_role == 1)
{
    $inventory_role = 'Utilisateur';
    $status_inventory = 'true';
}
else
{
    $inventory_role = 'NULL';
    $status_inventory = 'none';
}
    
if ($form_role == 1000)
    $form_role = 'Admin';
else
    $form_role = 'Utilisateur';