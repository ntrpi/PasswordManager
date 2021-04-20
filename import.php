<?php

use Codesses\php\Models\Session;
require_once "./php/Models/Session.php";

// Get the session object.
$session = Session::getInstance();

// If the user is not logged in, load the login page.
if( !$session->hasUser() ) {
  header( "Location: login.php" );
  exit;
}




?>


<html>
<head>
  <!--global head.php-->
  <?php include "php/head.php" ?>
  <title>Pass**** Manager Import</title>
  <link rel="stylesheet" href="./css/login.css">
</head>

<body>
  <!--main nav-->
  <?php include 'php/header.php' ?>
  <main>
    <div class="mainDiv">
      <!--side nav-->
      <?php include 'php/sideNav.php' ?>
      <!-- YOUR STUFF GOES HERE-->
      <div class="content">
        <div>
          <h2>Import Passwords</h2>

          <div class="formDiv">
            <form action="" method="POST">
              <div>
                <label for="fileInput" class="fileInputLabel">Choose a File</label>
                <div class="fileNameDiv"></div>
                <input class="hidden" id="fileInput" name="fileInput" type="file" />
              </div>
              <div class="inputDiv">
                <input type="submit" value="Upload" name="submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--global footer-->
  <?php include "php/footer.php" ?>
</body>

</html>