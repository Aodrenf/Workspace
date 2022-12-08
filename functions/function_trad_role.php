<?php

function tradRole()
{
    if ($_SESSION['get_workspace_role'] == 1) {
        $_SESSION['get_workspace_role'] = 'user';
    } elseif ($_SESSION['get_workspace_role'] == 3) {
        $_SESSION['get_workspace_role'] = 'supervisor';
    } elseif ($_SESSION['get_workspace_role'] == 1000) {
        $_SESSION['get_workspace_role'] = 'admin';
    } else {
        $_SESSION['get_workspace_role'] = "inconnu";
    }

    if ($_SESSION['get_badgeuse_role'] == 1) {
        $_SESSION['get_badgeuse_role'] = 'user';
    } elseif ($_SESSION['get_badgeuse_role'] == 3) {
        $_SESSION['get_badgeuse_role'] = 'supervisor';
    } elseif ($_SESSION['get_badgeuse_role'] == 1000) {
        $_SESSION['get_badgeuse_role'] = 'admin';
    } elseif ($_SESSION['get_badgeuse_role'] == 2) {
        $_SESSION['get_badgeuse_role'] = 'manager';
    } else {
        $_SESSION['get_badgeuse_role'] = "inconnu";
    }

    if ($_SESSION['get_form_role'] == 1) {
        $_SESSION['get_form_role'] = 'user';
    } elseif ($_SESSION['get_form_role'] == 1000) {
        $_SESSION['get_form_role'] = 'admin';
    } else {
        $_SESSION['get_form_role'] = "inconnu";
    }

    if ($_SESSION['get_inventory_role'] == 1) {
        $_SESSION['get_inventory_role'] = 'user';
    } elseif ($_SESSION['get_inventory_role'] == 1000) {
        $_SESSION['get_inventory_role'] = 'admin';
    } else {
        $_SESSION['get_inventory_role'] = "inconnu";
    }
}
