<?php
use PasswordManager\php\Models\{DatabaseTwo, LoginHistory, Session};
require_once "./php/Models/Session.php";
require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/LoginHistory.php';

// Get the session object.
$session = Session::getInstance();

// If the user is not logged in, redirect to the login page.
if( !$session->hasUser() ) {
  header( "Location: login.php" );
  exit;
}

$dbconnection = DatabaseTwo::getDb();
$s = new LoginHistory($dbconnection);
$loginHistory =  $s->getAllLoginHistory();
$user_id = $session->getUserId();
    // $loginHistorya =  $p->getAllLoginHistory($user_id, DatabaseTwo::getDb());

    if (isset($_POST['searchButton'])) {
      $str = $_POST['searchBar'];
      $sth = $s->getLoginHistoryById($str);
      // var_dump($sth);
    }
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
            <form action="listLoginHistory.php" method="POST" class="searchForm">
            <div class="inputDiv">
              <input type="text" class="searchBar" name="searchBar">
              <input type="submit" class="linkAsButton" name="searchButton" value="Search" />
            </div>
          </form>
          <table>
                <thead>
                  <tr>
                      <th class="tableHead">User</th>
                      <th class="tableHead">Action</th>
                      <th class="tableHead">Date and Time</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(isset($_POST['searchButton'])) {
                  foreach ($sth as $resultItem) { ?>
                  <tr>
                      <td><?= $resultItem->user_id; ?></td>
                      <td><?= $resultItem->action; ?></td>
                      <td><?= $resultItem->timestamp; ?></td>
                      <td>
                          <form action="./deleteLoginHistory.php" method="post">
                              <input type="hidden" name="lh_id" value="<?=  $resultItem->lh_id; ?>"/>
                              <input type="submit" class="inputDiv cBox" name="deleteLoginHistory" value="Delete" style="width:9em; height:4em;"/>
                          </form>
                      </td>
                  </tr>
                <?php }
                } else {
                  foreach ($loginHistory as $loginItem) { ?>
                    <tr>
                        <td><?= $loginItem->user; ?></td>
                        <td><?= $loginItem->action; ?></td>
                        <td><?= $loginItem->timestamp; ?></td>
                        <td>
                            <form action="./deleteLoginHistory.php" method="post">
                                <input type="hidden" name="lh_id" value="<?=  $loginItem->lh_id; ?>"/>
                                <input type="submit" class="inputDiv cBox" name="deleteLoginHistory" value="Delete" style="width:9em; height:4em;"/>
                            </form>
                        </td>
                    </tr>
                  <?php }
                } ?>
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