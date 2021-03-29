<?php

use Codesses\php\Models\{DatabaseTwo, Subscriber};
// require_once 'vendor/autoload.php';

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/Subscriber.php';

$dbconnection = DatabaseTwo::getDb();
$s = new subscriber();
$subscribers =  $s->getAllSubscribers(DatabaseTwo::getDb());

// $s = new Subscriber();
// $users = $c->getUsers(DatabaseTwo::getDb());

// $user = $_GET['make'] ?? "";

// if(isset($_GET['make'])){
//    $cars = $c->getCarsInMake(Database::getDb(), $_GET['make']);
// } else {
//     $cars = $c->getAllCars(Database::getDb());
// }


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
        <!-- YOUR STUFF GOES HERE-->
        <div class="content">
          <div>
            <h2 class="hidden">Subscribe</h2>
            <div class="formDiv">
              <table>
              <thead>        
              <tr>                  
                  <th>User Name</th>
                  <th>First Name</th>
                  <th>Last Name</th>       
                  <th>Frequency</th>
                  <th>User ID</th>
                  <th><!--Update--></th>
                  <th><!--Delete--></th>
              </tr>
              </thead>
              <tbody>
                  <?php foreach($subscribers as $subscriber) { ?>
                  <tr>
                      <td><?= $subscriber->uname; ?></td>
                      <td><?= $subscriber->fname; ?></td>
                      <td><?= $subscriber->lname; ?></td>
                      <td><?= $subscriber->frequency; ?></td>
                      <td><?= $subscriber->user; ?></td>
                      <td>
                          <form action="./updateSubscriber.php" method="post">
                              <input type="hidden" name="id" value="<?= $subscriber->id; ?>"/>
                              <input type="submit" name="updateSubscriber" value="Update"/>
                          </form>
                      </td>
                      <td>
                          <form action="./deleteSubscriber.php" method="post">
                              <input type="hidden" name="id" value="<?= $subscriber->id; ?>"/>
                              <input type="submit" name="deleteSubscriber" value="Delete"/>
                          </form>
                      </td>                    
                  </tr>         
              <?php } ?>
              </tbody>
          </table>
          <a href="./addSubscriber.php" id="btn_addSubscriber">Add</a>
              <!-- <form action="" method="POST">
                <fieldset>
                  <legend>Do you want to join the mailing list?</legend>
                    <div class="inputDiv">
                      <input type="radio" id="subscribeYes" name="subscribeYesNo" value="yes">
                      <label for="yes">Yes</label>
                      <input type="radio" id="subscribeNo" name="subscribeYesNo" value="no">
                      <label for=no>No</label>
                    </div>                  
                    <div class="inputDiv">
                      <label for="email">E-mail</label>
                      <input type="text" name="email" id="email" />
                    </div>
                </fieldset>
                <div class="inputDiv" id="subscribe_b">
                  <input type="submit" value="Subscribe" >
                </div>  
              </form> -->              
            </div>
          </div>
        </div>
      </div>
    </main>
    <!--global footer-->
    <?php include "php/footer.php"?>
  </body>
</html>