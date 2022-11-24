<?php
//redirect vers la badgeuse grace a la fonction cors
header('Access-Control-Allow-Origin: *');
include_once('../functions/function_cors.php');
session_start();
$SESSION = $_SESSION;
cors($SESSION);
