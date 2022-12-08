<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <select name="test" id="test">
        <option value="orange">orange</option>
        <option value="bleu" selected>bleu</option>
        <option value="rouge">rouge</option>
    </select>
    <input type="submit" id='sub' value='create_user'>
    </form>
</body>
</html>
<?php var_dump($_POST);