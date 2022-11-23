<?php
    header('Access-Control-Allow-Origin: *');
    include_once('functions.php');
    session_start();
    $SESSION = $_SESSION;
    cors($SESSION);