<?php
use Codesses\php\Models\{DatabaseTwo, Sharepassword};

require_once "./php/Models/Sharepassword.php";
require_once "./php/Models/DatabaseTwo.php";
require_once "./library/share-functions.php";

$sp = new Sharepassword();
$allSharedPass = $sp->getSharedpassword(DatabaseTwo::getDb());

if(isset($_POST['updateSharedPassword'])){
    $sp_id= $_POST['sp_id'];

    $db = DatabaseTwo::getDb();
    $sp = new Sharepassword();
    $shareByid = $sp->getSharedPasswordById($sp_id, $db);


    var_dump($shareByid);

}

?>


<!DOCTYPE html>
<html>
    <head>
        <!--global head.php-->
        <?php include "php/head.php" ?>
        <title>Pass**** Manager Edit and Delete Sharing</title>
        <link rel="stylesheet" href="./css/sharing.css">
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
                    <h2>Update Shared Password</h2>
                    <div class="cBox2">
                        <div class="cBox">
                            <h5><?= $shareByid->user_name; ?></h5>
                            <?= $shareByid->first_name; ?><br />
                            <?= $shareByid->url; ?>: <?= $shareByid->password; ?>
                            <br/>
                            <form action="./editSharing.php" method="post">
                                <input type="hidden" name="sp_id" value="<?= $shareByid->sp_id; ?>"/>
                                <input type="submit" class="formEdit" name="updateSharedPassword" value="Update"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    <!--global footer-->
        <?php include "php/footer.php"?>
    </body>
</html>

