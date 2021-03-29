<?php

 use Codesses\php\Models\{DatabaseTwo, Subscriber};
// require_once 'vendor/autoload.php';

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/Subscriber.php';

$user = $frequency2 = "";
$s2 = new subscriber();
// $users = $s2->getUsers(DatabaseTwo::getDb());

if(isset($_POST['updateSubscriber'])){
    $id= $_POST['subscriber_id'];
    
    $db = DatabaseTwo::getDb();

    $s = new subscriber();
    $subscriber = $s->getSubscriberById($id, $db);

    $user =  $subscriber->user;
    $frequency2 = $subscriber->frequency;
     

}
if(isset($_POST['updSubscriber'])){
    $id= $_POST['sid'];
    $user = $_POST['user'];
    $frequency = $_POST['frequency'];
    

    $db = DatabaseTwo::getDb();
    $s = new subscriber();
    $count = $s->updateSubscriber($id, $user, $frequency, $db);

    if($count){
       header('Location: subscribe.php');
    } else {
        echo "problem";
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Home</title>
    <link rel="stylesheet" href="./css/subscribe.css">
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
          <div>
            <h2 class="hidden">Subscribe</h2>
            <div class="formDiv">
              <form action="" method="POST">
              <input type="hidden" name="sid" value="<?= $id ?>"/>
                <fieldset>
                  <legend>Do you want to join the mailing list?</legend>
                  
                    <!-- <div class="inputDiv">
                      <input type="radio" id="subscribeYes" name="subscribeYesNo" value="yes">
                      <label for="yes">Yes</label>
                      <input type="radio" id="subscribeNo" name="subscribeYesNo" value="no">
                      <label for=no>No</label>
                    </div>                   -->
                     <div class="inputDiv">
                      <label for="user">User_ID</label>
                      <input type="text" name="user" id="user" value="<?= $user; ?>"  />
                    </div>
                    <div class="inputDiv">
                      <input type="radio" id="subscribew" name="frequency" value="weekly" <?= ($frequency2 == 'weekly') ? 'checked' : ''; ?> />
                      <label for="weekly">Weekly</label>
                      <input type="radio" id="subscribem" name="frequency" value="monthly" <?= ($frequency2 == 'monthly') ? 'checked' : ''; ?>/>
                      <label for="monthly">Monthly</label>
                      <input type="radio" id="subscribes" name="frequency" value="special" <?= ($frequency2 == 'special') ? 'checked' : ''; ?>/>
                      <label for="specials">Specials</label>
                    </div> 
                </fieldset>
                <!-- <div class="inputDiv" id="subscribe_b">
                  <input type="submit" value="Subscribe" >
                </div>   -->
                <a href="./subscribe.php" id="btn_back">Back</a>
                <button type="submit" name="updSubscriber" id="btn-submit">Update</button>
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