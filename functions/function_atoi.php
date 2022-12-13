<?php 
function atoi()
{
    if(isset($_POST))
    {
        if($_POST['workspace_role'] == 'user')
        {
            $_POST['workspace_role'] = '1';
            $_SESSION['get_workspace_role'] = 'user';
        }elseif($_POST['workspace_role'] == 'supervisor')
        {
            $_POST['workspace_role'] = '3';
            $_SESSION['get_workspace_role'] = 'supervisor';
        }elseif($_POST['workspace_role'] == 'admin')
        {
            $_POST['workspace_role'] = '1000';
            $_SESSION['get_workspace_role'] = 'admin';
        }else{
            $_POST['workspace_role'] = "1";
            $_SESSION['get_workspace_role'] = 'user';

        }

        if($_POST['badgeuse_role'] == 'user')
        {
            $_POST['badgeuse_role'] = '1';
            $_SESSION['get_badgeuse_role'] = 'user';
        }elseif($_POST['badgeuse_role'] == 'supervisor')
        {
            $_POST['badgeuse_role'] = '3';
            $_SESSION['get_badgeuse_role'] = 'supervisor';
        }elseif($_POST['badgeuse_role'] == 'admin')
        {
            $_POST['badgeuse_role'] = '1000';
            $_SESSION['get_badgeuse_role'] = 'admin';

        }elseif($_POST['badgeuse_role'] == 'manager')
        {
            $_POST['badgeuse_role'] = '2';
            $_SESSION['get_badgeuse_role'] = 'manager';

        }else{
            $_POST['badgeuse_role'] = "1";
            $_SESSION['get_badgeuse_role'] = 'user';

        }

        if($_POST['form_role'] == 'user')
        {
            $_POST['form_role'] = '1';
            $_SESSION['get_form_role'] = 'user';

        }elseif($_POST['form_role'] == 'admin')
        {
            $_POST['form_role'] = '1000';
            $_SESSION['get_form_role'] = 'admin';

        }else{
            $_POST['form_role'] = "1";
            $_SESSION['get_form_role'] = 'user';

        }

        if($_POST['inventory_role'] == 'user')
        {
            $_POST['inventory_role'] = '1';
            $_SESSION['get_inventory_role'] = 'user';

        }elseif($_POST['inventory_role'] == 'admin')
        {
            $_POST['inventory_role'] = '1000';
            $_SESSION['get_inventory_role'] = 'user';

        }
        elseif($_POST['inventory_role'] == 'NULL')
        {
            $_POST['inventory_role'] = '0';
            $_SESSION['get_inventory_role'] = 'NULL';

        }else{
            $_POST['inventory_role'] = "1";
            $_SESSION['get_inventory_role'] = 'user';

        }
    }
}
atoi();