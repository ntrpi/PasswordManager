<?php
use Codesses\php\Models\{DatabaseTwo, Sharepassword};

require_once "./php/Models/Sharepassword.php";
require_once "./php/Models/DatabaseTwo.php";

$dbcon = DatabaseTwo::getDb();
//list the shared password
$sp = new Sharepassword();
//connection to databse to access all shared password 
$allspass = $sp->listallsharepass(DatabaseTwo::getDb());
//list shared password under that username
//$allshared = $listSharedPass->listSharedPasswordByUser(DatabaseTwo::getDb(), $_GET['user_id']);



?>


<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager List Sharing</title>
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
                    <!--listing the shared password-->
                    <!-- list not working -->
                    <?php foreach ($allspass as $shared) { ?>
                    <div class="cBox">
                        <h5><?= $shared['owner_id'] ?></h5>
                        <p><?= $shared['url_id'] ?></p>
                        <p><?= $shared['recipient_id'] ?></p>
                    </div>
                    <form action="./editdeleteSharing.php" method="post">
                        <input type="hidden" name="sp_id" value="<?= $shared->$sp_id; ?>"/>
                        <input type="submit" class="editSP" name="updateSharedPassword" value="Update"/>
                    </form>
                    <!--closing php tag-->
                    <?php } ?>
            </div>
        </div>
    </main>
<!--global footer-->
<?php include "php/footer.php"?>
  </body>
</html>


