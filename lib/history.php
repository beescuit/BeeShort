<?php
session_start();

include '../config.php';
include 'mysql.php';

if (!isset($_SESSION['json_history'])) {
  $_SESSION['json_history'] = "";
}

$history = $_SESSION['json_history'];

$json = json_decode($history ,true);

if ($json['1'] == "") {
  exit();
}
?>

<table class="highlight">
  <thead>
    <tr>
        <th data-field="url">Short Url</th>
        <th data-field="short">Long Url</th>
    </tr>
  </thead>

  <tbody>


<?php
for ($i=0; $i < 5; $i++) {
  $curr = count($json) - $i;
  if ($curr < count($json) - 5) {
    exit();
  }
  if (!isset($json[$curr])) {
    exit();
  }
  $code = $json[$curr];
  $verify = "SELECT * FROM `shorturls` WHERE `ShortUrl` = '$code'";
  $run = mysqli_query($dbcon, $verify);
  if (mysqli_num_rows($run) == 1) {
    $row = mysqli_fetch_array($run);
    $url = $row['URL'];
    $views = $row['views'];
  } else {
    $url = "Not Found.";
    $views = 0;
  }
?>
      <tr>
      <td><a href="<?php echo $weburl . $json[$curr]; ?>"><?php echo $weburl . $json[$curr]; ?></a></td>
      <td><a href="<?php echo $url ?>"><?php echo $url ?></a></td>
      <td><?php echo $views; ?> views.</td>
      </tr>


<?php
}
?>

  </tbody>
</table>
