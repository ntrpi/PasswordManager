<?php

    //Elle

    use Codesses\php\Models\{DatabaseTwo, LoginHistory};

    // require_once 'vendor/autoload.php';
    // require_once 'Library/form-functions.php';

    require_once './php/Models/DatabaseTwo.php';
    require_once './php/Models/LoginHistory.php';

    $dbconnection = DatabaseTwo::getDb();
    $s = new LoginHistory();
    $contactMessages =  $s->getAllLoginHistory(DatabaseTwo::getDb());

?>
<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Login History</title>
    <link rel="stylesheet" href="./css/loginHistory.css">
    <script src="./js/script.js" async defer></script>
  </head>
  <!-- Body -->
  <body>
    <!--main nav-->
    <?php include 'php/header.php' ?>
    <main>
      <div class="mainDiv">      

        <!--side nav-->
        <?php include 'php/sideNav.php' ?>       

        <div class="content">
          <div>
            <h2 class="title">Login History</h2>                   
            <div class="formDiv" id="history">            
              <table>
                <thead>
                  <tr>
                      <th class="tableHead">Action</th>
                      <th class="tableHead">Date and Time</th>
                      <th class="tableHead">Duration</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($loginHistory as $loginHistory) { ?>
                  <tr>
                      <th><?= $loginHistory->lh_id; ?></th>
                      <td><?= $loginHistory->action; ?></td>
                      <td><?= $loginHistory->timestamp; ?></td>
                      <td><?= $loginHistory->user; ?></td>
                      <td>
                          <form action="./updateContactMessage.php" method="post" style="margin:0;background-color:#562f56;text-align:center;padding:1em;font-size:2em;">
                              <input type="hidden" name="cm_id" value="<?= $contactMessages->cm_id; ?>"/>
                              <input type="submit" class="inputDiv cBox" name="updateContactMessage" value="Update" style="width:9em; height:4em;"/>
                          </form>
                      </td>
                      <td>
                          <form action="./deleteContactMessage.php" method="post" style="margin:0;background-color:#562f56;text-align:center;padding:1em;font-size:2em;">
                              <input type="hidden" name="cm_id" value="<?=  $contactMessages->cm_id; ?>"/>
                              <input type="submit" class="inputDiv cBox" name="deleteContactMessage" value="Delete" style="width:9em; height:4em;"/>
                          </form>
                      </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>                
          </div>
        </div>
      </div>
    </main>
    <!--global footer-->
    <?php include "php/footer.php"?>
  </body>
</html>