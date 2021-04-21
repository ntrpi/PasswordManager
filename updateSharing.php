<?php
//SESSION VARIABLE
use Codesses\php\Models\{Session};
require_once "./php/Models/Session.php";

// Get the session object.
$session = Session::getInstance();

// If the user is not logged in, redirect to the login page.
if( !$session->hasUser() ) {
  header( "Location: login.php" );
  exit;
}
//File created by Wafa 04/2021
use Codesses\php\Models\{DatabaseTwo, Sharepassword};

require_once "./php/Models/Sharepassword.php";
require_once "./php/Models/DatabaseTwo.php";
require_once "./library/share-functions.php";

$sp = new Sharepassword();

$owner_id = $session->getUserId();
$urls = $sp->getAllurlbyId($owner_id, DatabaseTwo::getDb());

if(isset($_POST['updateSharedPassword'])){
    $sp_id = $_POST['sp_id'];
    $url_id = $_POST['url_id']; //Warning: Undefined array key "url" in /Applications/XAMPP/xamppfiles/htdocs/php-class/Group7_Codesses_PasswordManager/updateSharing.php on line 15

    $db = DatabaseTwo::getDb();
    $sp = new Sharepassword();
    $shareByid = $sp->getSharedPasswordById($sp_id, $db);

    //issues with update password
    $updateShare = $sp->updateSharedPasswordByUrl($sp_id, $url_id, $db);

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
                            <h5><?= $shareByid->from_user; ?></h5>
                            <?= $shareByid->to_user; ?><br />
                            <label for="url">Url:</label>
                            <!--look into this-->
                                <select  name="url_id" class="form-control" id="<?= $shareByid->url_id; ?>" >
                                    <!--php statment-->
                                    <?php echo urlDropdown($urls) ?>
                                </select>
                            <br/>
                            <form action="./listSharing.php" method="post">
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

