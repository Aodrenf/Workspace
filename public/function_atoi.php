<?php 
// on transforme les données ascii en int afin de les rentrer dans la base de donnée
function atoi()
{
    if(isset($_POST['workspace_role']))
    {
        if($_POST['workspace_role'] == 'user' || $_POST['workspace_role'] == 'Utilisateur')
        {
            $_POST['workspace_role'] = '1';
            $_SESSION['get_workspace_role'] = 'Utilisateur';
        }elseif($_POST['workspace_role'] == 'supervisor' || $_POST['workspace_role'] == 'Responsable')
        {
            $_POST['workspace_role'] = '3';
            $_SESSION['get_workspace_role'] = 'Responsable';
        }elseif($_POST['workspace_role'] == 'admin' || $_POST['workspace_role'] == 'Admin')
        {
            $_POST['workspace_role'] = '1000';
            $_SESSION['get_workspace_role'] = 'Admin';
        }else{
            $_POST['workspace_role'] = "1";
            $_SESSION['get_workspace_role'] = 'Utilisateur';

        }

        if($_POST['badgeuse_role'] == 'user' || $_POST['badgeuse_role'] == 'Utilisateur')
        {
            $_POST['badgeuse_role'] = '1';
            $_SESSION['get_badgeuse_role'] = 'Utilisateur';
        }elseif($_POST['badgeuse_role'] == 'supervisor' || $_POST['badgeuse_role'] == 'Responsable')
        {
            $_POST['badgeuse_role'] = '3';
            $_SESSION['get_badgeuse_role'] = 'Responsable';
        }elseif($_POST['badgeuse_role'] == 'admin' || $_POST['badgeuse_role'] == 'Admin')
        {
            $_POST['badgeuse_role'] = '1000';
            $_SESSION['get_badgeuse_role'] = 'Admin';

        }elseif($_POST['badgeuse_role'] == 'manager' || $_POST['badgeuse_role'] == 'Manager')
        {
            $_POST['badgeuse_role'] = '2';
            $_SESSION['get_badgeuse_role'] = 'Manager';

        }else{
            $_POST['badgeuse_role'] = "1";
            $_SESSION['get_badgeuse_role'] = 'Utilisateur';

        }

        if($_POST['form_role'] == 'user' || $_POST['form_role'] == 'Utilisateur')
        {
            $_POST['form_role'] = '1';
            $_SESSION['get_form_role'] = 'Utilisateur';

        }elseif($_POST['form_role'] == 'admin' || $_POST['form_role'] == 'Admin')
        {
            $_POST['form_role'] = '1000';
            $_SESSION['get_form_role'] = 'Admin';

        }else{
            $_POST['form_role'] = "1";
            $_SESSION['get_form_role'] = 'Utilisateur';

        }

        if($_POST['inventory_role'] == 'user' || $_POST['inventory_role'] == 'Utilisateur')
        {
            $_POST['inventory_role'] = '1';
            $_SESSION['get_inventory_role'] = 'Utilisateur';

        }elseif($_POST['inventory_role'] == 'admin' || $_POST['inventory_role'] == 'Admin')
        {
            $_POST['inventory_role'] = '1000';
            $_SESSION['get_inventory_role'] = 'Admin';

        }
        elseif($_POST['inventory_role'] == 'NULL')
        {
            $_POST['inventory_role'] = '0';
            $_SESSION['get_inventory_role'] = 'NULL';

        }else{
            $_POST['inventory_role'] = "0";
            $_SESSION['get_inventory_role'] = 'NULL';

        }

        if($_POST['ticketing_role'] == 'user' || $_POST['ticketing_role'] == 'Utilisateur')
        {
            $_POST['ticketing_role'] = '1';
            $_SESSION['get_inventory_role'] = 'Utilisateur';

        }elseif($_POST['ticketing_role'] == 'admin' || $_POST['ticketing_role'] == 'Admin')
        {
            $_POST['ticketing_role'] = '1000';
            $_SESSION['get_ticketing_role'] = 'Admin';

        }
        elseif($_POST['ticketing_role'] == 'NULL')
        {
            $_POST['ticketing_role'] = '0';
            $_SESSION['get_ticketing_role'] = 'NULL';

        }else{
            $_POST['ticketing_role'] = "0";
            $_SESSION['get_ticketing_role'] = 'NULL';

        }
    }
}
atoi();