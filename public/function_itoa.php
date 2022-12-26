<?php
// permet de transformer les valeur des roles qui sont en int en ascii
function itoa()
{
    if ($_SESSION['get_workspace_role'] == 1 || $_SESSION['get_workspace_role'] == 'Utilisateur') {
        $_SESSION['get_workspace_role'] = 'Utilisateur';
    } elseif ($_SESSION['get_workspace_role'] == 3 || $_SESSION['get_workspace_role'] == 'Responsable') {
        $_SESSION['get_workspace_role'] = 'Responsable';
    } elseif ($_SESSION['get_workspace_role'] == 1000 || $_SESSION['get_workspace_role'] == 'Admin') {
        $_SESSION['get_workspace_role'] = 'Admin';
    } else {
        $_SESSION['get_workspace_role'] = "inconnu";
    }

    if ($_SESSION['get_badgeuse_role'] == 1 || $_SESSION['get_badgeuse_role'] == 'Utilisateur') {
        $_SESSION['get_badgeuse_role'] = 'Utilisateur';
    } elseif ($_SESSION['get_badgeuse_role'] == 3 || $_SESSION['get_badgeuse_role'] == 'Responsable') {
        $_SESSION['get_badgeuse_role'] = 'Responsable';
    } elseif ($_SESSION['get_badgeuse_role'] == 1000 || $_SESSION['get_badgeuse_role'] == 'Admin') {
        $_SESSION['get_badgeuse_role'] = 'Admin';
    } elseif ($_SESSION['get_badgeuse_role'] == 2 || $_SESSION['get_badgeuse_role'] == 'Manager') {
        $_SESSION['get_badgeuse_role'] = 'Manager';
    } else {
        $_SESSION['get_badgeuse_role'] = "inconnu";
    }

    if ($_SESSION['get_form_role'] == 1 || $_SESSION['get_form_role'] == 'Utilisateur') {
        $_SESSION['get_form_role'] = 'Utilisateur';
    } elseif ($_SESSION['get_form_role'] == 1000 || $_SESSION['get_form_role'] == 'Admin') {
        $_SESSION['get_form_role'] = 'Admin';
    } else {
        $_SESSION['get_form_role'] = "inconnu";
    }

    if ($_SESSION['get_inventory_role'] == 1 || $_SESSION['get_inventory_role'] == 'Utilisateur') {
        $_SESSION['get_inventory_role'] = 'Utilisateur';
    } elseif ($_SESSION['get_inventory_role'] == 1000 || $_SESSION['get_inventory_role'] == 'Admin') {
        $_SESSION['get_inventory_role'] = 'Admin';
    }elseif ($_SESSION['get_inventory_role'] == 0 || $_SESSION['get_inventory_role'] == 'NULL') {
        $_SESSION['get_inventory_role'] = 'NULL';
    } else {
        $_SESSION['get_inventory_role'] = "inconnu";
    }

    if ($_SESSION['get_ticketing_role'] == 1 || $_SESSION['get_ticketing_role'] == 'Utilisateur') {
        $_SESSION['get_ticketing_role'] = 'Utilisateur';
    } elseif ($_SESSION['get_ticketing_role'] == 1000 || $_SESSION['get_ticketing_role'] == 'Admin') {
        $_SESSION['get_ticketing_role'] = 'Admin';
    }elseif ($_SESSION['get_ticketing_role'] == 0 || $_SESSION['get_ticketing_role'] == 'NULL') {
        $_SESSION['get_ticketing_role'] = 'NULL';
    } else {
        $_SESSION['get_ticketing_role'] = "inconnu";
    }
}
