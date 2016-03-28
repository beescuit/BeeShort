<?php
// Include config for strings
include 'config.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta charset="utf-8">
    <title><?=$pagetitle?></title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

    <!-- App files -->
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="css/app.css" media="screen" title="no title">
  </head>
  <body>
    <div class="container">
      <img class="short-title" src="images/logo.png" alt=""/>
      <div class="row">
        <div class="input-field col s6">
          <input type="text" id="url" value="" placeholder="http://google.com/" autocomplete="off" class="form-control" required>
        </div>
        <div class="input-field col s3">
          <input type="text" id="customurl" value="" placeholder="Custom Url" autocomplete="off" class="form-control tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?=$customurltip?>" required>
        </div>
        <div class="input-field col s1">
          <a class="btn btn-success waves-effect waves-light" onclick="shortUrl()">Short&nbsp;Url!</a>
        </div>
      </div>
      <div id="table">

      </div>
    </div>



  </body>
</html>
