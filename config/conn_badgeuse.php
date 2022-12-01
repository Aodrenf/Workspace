<?php
//redirect vers la badgeuse grace a la fonction workspace_to_badgeuse
//header('Access-Control-Allow-Origin: *');
include_once('../functions/function_workspace_to_badgeuse.php');
session_start();
$SESSION = $_SESSION;
workspace_to_badgeuse($SESSION);
