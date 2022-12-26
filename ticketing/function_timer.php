<?php
function timer()
{
    $time = time() - $_SESSION['timer'];
    if ($time > 600) { //subtract new timer from the old one
        echo "<script>alert('15 Minutes over!');</script>";
        session_destroy();
        header("Location: ../public/index.php"); //redirect to index.php
        echo "session terminee";
        exit;
    } else {
        $_SESSION['timer'] = time(); //set new timer
    }
}
function setTimer()
{
    $_SESSION['timer'] = time();
}