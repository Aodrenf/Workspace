<?php

function hashh()
{
$password = "voiture";
$prefix_salt = md5('pomme');
$suffix_salt = md5('tableau');
$pass = md5($password);
$posthash = $prefix_salt . $pass . $suffix_salt;
$algo = "sha256";
$pass_hashed = hash($algo, $posthash, false);

return $pass_hashed;
}

$test = hashh();

echo "$test";


