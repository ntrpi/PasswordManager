<?php

/* File created by Barbara Cam 2021/04. */

use Codesses\php\Models\{Session};
require_once "./php/Models/Session.php";

// Get the session object.
$session = Session::getInstance();

// If the user is not logged in, redirect to the login page.
if( !$session->hasUser() ) {
  header( "Location: login.php" );
  exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager recovery read and delete</title>
    <link rel="stylesheet" href="./css/recoveryInformationMain.css">
    <script src="./js/script.js" async defer></script>
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
                <div id="optionDiv">
                    <h3>How would you like to recover your personal information?</h3>
                    <div class="options">
                        <a href="recoveryInformation.php" id="btnGoRecovery" class="linkAsButton">Security Questions</a>                
                    </div>                  
                    <div class="options">
                        <a href="twoStepEmail.php" id="btnGoTwoStep" class="linkAsButton">E-mail</a>
                    </div>
                </div>
              </div>
            </div>
        </main>
        <!--global footer-->
        <?php include "php/footer.php"?>
  </body>
</html>