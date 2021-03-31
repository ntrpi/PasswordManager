<?php
use Codesses\php\Models\{DatabaseTwo, Sharepassword};

require_once "./php/Models/Sharepassword.php";
require_once "./php/Models/DatabaseTwo.php";

//makesure get post id -> url id userid 
//get all the users and create a drop down looping through all the users 


?>


<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Edit and Delete Sharing</title>
    <link rel="stylesheet" href="./css/RUDsharing.css">
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
                <h2>Pass**** Sharing</h2>
                <div class="contentBox">
                    <div class="cBox">
                        <h5>User 1</h5>
                        <a class="editSP" href="<?php echo 'editdeleteSharing.php'; ?>">Edit</a> ||
                    </div>
                    <div class="cBox">
                        <h5>User 2</h5>
                    </div>
                    <div class="cBox">
                        <h5>User 3</h5>
                    </div>
                    <div class="cBox">
                        <h5>User 4</h5>
                    </div>
                    <div class="cBox">
                        <h5>User 5</h5>
                    </div>
                    <div class="cBox">
                        <h5>User 6</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!--global footer-->
<?php include "php/footer.php"?>
  </body>
</html>

