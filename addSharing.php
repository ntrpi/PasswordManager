<?php
use Codesses\php\Models\{DatabaseTwo, Sharepassword};

require_once "./php/Models/Sharepassword.php";
require_once "./php/Models/DatabaseTwo.php";
require_once "./library/share-functions.php";

$dbcon = DatabaseTwo::getDb();
$sp = new Sharepassword();

//add in if block for your session variable in drop down function!!
//for now added a user drop down to insure shared_passwords table is getting updated
$owners = $sp->getAllusers($dbcon);
$recipients = $sp->getAllusers($dbcon);
$urls = $sp->getAllurl($dbcon);

$successMsg = "";
$invalidMsg = "";

//sharing a password
if(isset($_POST['addSharing'])){
    var_dump($_POST);
    $owner_id = $_POST['owner'];
    $recipient_id = $_POST['recipient'];
    $url_id = $_POST['url'];

    $sp = new Sharepassword();
    $addShare= $sp->sharePassword($url_id, $owner_id, $recipient_id, $dbcon);


    if($addShare){
        $successMsg = '<div style="display: block;">
        <h4>Password has been shared!</h4>
        </div>';
    } else {
        $invalidMsg = '<div style="display: block;">
        <h4>Please try again!</h4>
        </div>';
    }

 }


?>

<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Create Sharepassword</title>
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
            <!--Share Password-->
            <div class="content">
                <h2>Share Password </h2>
                <div class="cBox2">
                    <div class="cBox">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="owner">Owner :</label>
                                <select  name="owner" class="form-control" id="owner" >
                                    <!--php statment-->
                                    <?php echo ownerDropdown($owners) ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient">Recipient :</label>
                                <select  name="recipient" class="form-control" id="recipient" >
                                    <!--php statment-->
                                    <?php echo userDropdown($recipients) ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="url">Url :</label>
                                <select  name="url" class="form-control" id="url" >
                                    <!--php statment-->
                                    <?php echo urlDropdown($urls) ?>
                                </select>
                            </div>
                            <button type="submit" name="addSharing" class="submitBtn" id="submitBtn">
                                Share Password
                            </button>
                        </form>
                    </div>
                </div>
                <!--onsubmit message-->
                <?php echo $successMsg; ?>
                <?php echo $invalidMsg; ?>
            </div>
        </div>
    </main>
    <!--global footer-->
    <?php include "php/footer.php"?>
  </body>
</html>

