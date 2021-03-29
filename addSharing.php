<?php
use Codesses\php\Models\{DatabaseTwo, Sharepassword};

require_once "./php/Models/Sharepassword.php";
require_once "./php/Models/DatabaseTwo.php";



?>

<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Create Sharepassword</title>
    <link rel="stylesheet" href="./css/sharePass.css">
    <script src="./js/script.js" async defer></script>
  </head>
  <body>
    <!--main nav-->
    <?php include 'php/header.php' ?>
    <main>
        <div class="mainDiv">
            <!--side nav-->
        <?php include 'php/sideNav.php' ?>
            <!--Share Password-->
            <div class="content">
                <h2>Share Password </h2>
                <form action="" method="POST">
                    <div class="shareDiv">
                        <label for="shareName">Name</label>
                        <input type="text" name="shareName" id="shareName" />
                        <label for="shareEmail">Email</label>
                        <input type="text" name="shareEmail" id="shareEmail" />
                        <div>
                        <input type="submit" value="Share Password">
                        </div>
                    </div>
                </form>
                <div id="shareSuccess" style="display: none">
                    <p>Password has been shared!</p>
                </div>
            </div>
        </div>
    </main>
    <!--global footer-->
    <?php include "php/footer.php"?>
  </body>
</html>
