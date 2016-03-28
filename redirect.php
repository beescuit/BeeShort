<?php
// Including libraries
include 'config.php';

$dbcon = mysqli_connect($host,$user,$pass);
mysqli_select_db($dbcon,$db);

$code = str_replace("/", "", $_SERVER['REQUEST_URI']);
$code = mysqli_real_escape_string($dbcon, $code);
$verify = "SELECT * FROM `shorturls` WHERE `ShortUrl` = '$code'";
$run = mysqli_query($dbcon, $verify);
if (mysqli_num_rows($run) == 1) {
  $row = mysqli_fetch_array($run);
  $views = $row['views'] + 1;
  $viewcount = "UPDATE `shorturls` SET `views` = $views WHERE `ShortUrl` = $code";
  mysqli_query($dbcon, $viewcount);
  $url = $row['URL'];
  header( "Location: $url" );
} else {
  header( "Location: /" );
}
?>
