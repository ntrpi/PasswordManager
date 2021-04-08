<?php

    //Elle

    use Codesses\php\Models\{DatabaseTwo, LoginHistory};

    // require_once 'vendor/autoload.php';
    // require_once 'Library/form-functions.php';

    require_once './php/Models/DatabaseTwo.php';
    require_once './php/Models/LoginHistory.php';

    $dbconnection = DatabaseTwo::getDb();
    $s = new LoginHistory();
    $loginHistory =  $s->getAllLoginHistory(DatabaseTwo::getDb());

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
            <div class="formDiv" id="history" style="background-color: var(--darkPurple); color:var(--lightGrey);">            
              <table>
                <thead>
                  <tr>
                      <th class="tableHead">User</th>
                      <th class="tableHead">Action</th>
                      <th class="tableHead">Date and Time</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($loginHistory as $loginHistory) { ?>
                  <tr>
                      <td><?= $loginHistory->user; ?></td>
                      <td><?= $loginHistory->action; ?></td>
                      <td><?= $loginHistory->timestamp; ?></td>
                      <td>
                          <form action="./deleteLoginHistory.php" method="post">
                              <input type="hidden" name="lh_id" value="<?=  $loginHistory->lh_id; ?>"/>
                              <input type="submit" class="inputDiv cBox" name="deleteLoginHistory" value="Delete" style="width:9em; height:4em;"/>
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