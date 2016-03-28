<?php
include '../config.php';
include 'mysql.php';

function sqli_protect($string) {
  $string = stripslashes($string);
  $string = mysqli_real_escape_string($dbcon, $string);
  return $string;
}

// Stackoverflow FTW
function generateRandomString($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
