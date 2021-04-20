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
use Codesses\php\Models\{DatabaseTwo, PasswordHints};
require_once "./php/Models/PasswordHints.php";
require_once "./php/Models/DatabaseTwo.php";



if (isset($_POST['hintbutton'])){
    $user_id = $session->getUserId();
    $url_id = $_POST['url_id'];

    $ph = new PasswordHints();
    $pHint = $ph->getPasswordHintbyId($url_id, DatabaseTwo::getDb());

    $passHint = $pHint->password_hint;
    
}

$ph = new PasswordHints();
$passHint = $ph->getPasswordHintbyId($user_id, $url_id, DatabaseTwo::getDb());



?>

<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Password Hints</title>
    <link rel="stylesheet" href="./css/passHints.css">
    <script src="./js/script.js" async defer></script>
  </head>
  <body>
    <!--main nav-->
    <?php include 'php/header.php' ?>
    <main>
        <div class="mainDiv">
            <!--side nav-->
        <?php include 'php/sideNav.php' ?>
            <!--add or update password hints-->
            <div class="content">
                <h2>Password Hints</h2>
                <form action="" method="POST">
                    <div class="hintDiv">
                        <input type="hidden" name="url_id" value="<?= $url_id; ?>" />
                        <!--Hint-->
                        <label for="phint">Hint</label>
                        <input type="text" name="phint" id="phint" value="<?= $passHint; ?>"/>
                        <div>
                        <input type="submit" name="addHint" value="Add">
                        <input type="submit" name="updateHint" value="Update">
                        <input type="submit" name="deleteHint" value="Delete">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
<!--global footer-->
<?php include "php/footer.php"?>
  </body>
</html>
  
