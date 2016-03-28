<?php
include '../config.php';
$dbcon = mysqli_connect($host,$user,$pass);
mysqli_select_db($dbcon,$db);
?>
