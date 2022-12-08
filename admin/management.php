<?php
session_start();
if(isset($_POST['delete']))
{
    $_SESSION['modif_type'] = 'delete';
}elseif(isset($_POST['edit']))
{
    $_SESSION['modif_type'] = 'edit';
}elseif(isset($_POST['create']))
{
    $_SESSION['modif_type'] = 'create';
}


if($_SESSION['workspace'] == true)
{
    if (isset($_SESSION['modif_type']))
    {
        if($_SESSION['modif_type'] == 'create')
        {
        header('Location: create_user.php');
        }elseif($_SESSION['modif_type'] == 'delete')
        {
            $_SESSION['user_id_edit'] = $_POST['user_id'];
            include_once('../functions/function_delete_user.php');
            delUser();
            unset($_POST['delete']);
            
        }elseif($_SESSION['modif_type']  == 'edit')
        {
            $_SESSION['user_id_edit'] = $_POST['user_id'];
            header('Location: edit_user.php');
        }elseif($_SESSION['modif_type']  == 'created')
        {
            echo "Utilisateur créer";
        }
        elseif($_SESSION['modif_type']  == 'deleted')
        {
            echo "Utilisateur supprimé";
        }
        elseif($_SESSION['modif_type']  == 'edited')
        {
            echo "Utilisateur edité";
        }elseif($_SESSION['modif_type']  == '')
        {}
        else echo "Ce mode n'existe pas";
}
}else header('Location: ../index.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <button type="submit" name="create">Creer un user</button>
    </form><br><br><br>
<tbody>
                   <?php
                   
                   include_once('../functions/function_connect.php');
                        $stmt = $sql->prepare("SELECT * FROM users ORDER BY `firstname` ASC");
                        $stmt->execute();
                        $users = $stmt->fetchAll();  
                        foreach($users as $user){
                    ?>
                    <tr>
                        <td><b><?php echo $user['lastname']; ?></b></td>
                        <td><?php echo $user['firstname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        
                        <td>
                        <form method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                         <button type="submit" name="edit">edit</button>
                        </form>
                        <form onsubmit="return confirm('Cet utilisateur sera supprimé')" action="" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger">delete</button>
                        </form>
                            </div>
                        </td>
                    </tr>
                    <?php }

                    // les redirects vers create ou edit
                  
                     ?>
                  </tbody>
</body>
</html>