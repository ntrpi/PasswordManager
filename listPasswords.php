<?php

use Codesses\php\Models\{Session};
require_once "./php/Models/Session.php";

// Get the session object.
$session = Session::getInstance();

// If the user is not logged in, redirect to the login page.
if( !$session->hasUser() ) {
  header( "Location: login.php" );
  exit;
}

use Codesses\php\Models\{DatabaseTwo, Password};

require "./php/Models/Crudpassword.php";
require "./php/Models/DatabaseTwo.php";

$dbcon = DatabaseTwo::getDb();
$p = new Password();
$user_id = $session->getUserId();
$password =  $p->getAllPasswords($user_id, DatabaseTwo::getDb());

// Elle making stuff up
if (isset($_POST['searchButton'])) {
  $searching = $_POST['searchBar'];
  // $st = new Password();
  // $lhs =  $st->getAllPasswords(DatabaseTwo::getDb());
  // $sth = $dbconnection->prepare("SELECT * FROM urls WHERE * = '$str'");
  // $sth->setFetchMode(\PDO:: FETCH_OBJ);
  // $sth->execute();
  $searchAccess = $dbcon->prepare("SELECT * FROM 'url' WHERE Name = '$searching'");
  $searchAccess->setFetchMode(\PDO:: FETCH_OBJ);
  $searchAccess->execute();

  if($row = $searchAccess->fetch())
  {
    ?>
    <br><br><br>
    <table>
      <tr>
        <th>url</th>
        <th>username</th>
        <th>password</th>
      </tr>
      <tr>
        <td><?php echo $row->url; ?></td>
        <td><?php echo $row->user_name; ?></td>
        <td><?php echo $row->password; ?></td>
      </tr>
    
    </table>
  <?php
  }
  else {
    echo "Uh, Oh, we didn't find any results";
  }
} //End of Elle
?>

<!DOCTYPE html>
<html>

<head>
  <!--global head.php-->
  <?php include "php/head.php" ?>
  <title>Pass**** Manager Home</title>
  <link rel="stylesheet" href="./css/passwords.css">
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
          <h2>Passwords</h2>
          <form action="#" method="GET" class="searchForm">
            <div class="inputDiv">
              <input type="text" class="searchBar" name="searchBar">
              <input type="submit" class="linkAsButton" name="searchButton" value="Search" />
            </div>
          </form>
          <table class="pwTable">
            <thead>
              <tr>
                <th class="urlpassword">URL</th>
                <th class="urlpassword">Username</th>
                <th class="urlpassword">Password</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($password as $pass) { ?>
                <tr class="pwTableRow">
                  <td class="urlpassword"><?= $pass->url ?></td>
                  <td class="urlpassword"><?= $pass->user_name ?></td>
                  <td class="urlpassword"><?= $pass->password ?></td>
                  <td class="pwButtonsTd">
                    <div class="inputDiv">
                      <form action="./updatePassword.php" method="post">
                        <input type="hidden" name="url_id" value="<?= $pass->url_id ?>" />
                        <input type="submit" class="updatebutton" name="updatebutton" value="Edit" />
                        </form>
                    </div>
                    <div class="inputDiv">
                      <form action="./deletePassword.php" method="post">
                        <input type="hidden" name="url_id" value="<?= $pass->url_id ?>" />
                        <input type="submit" class="deletebutton" name="deletebutton" value="Delete" />
                        </form>
                    </div>
                    <div class="inputDiv">
                      <form action="./passHints.php" method="post">
                        <input type="hidden" name="url_id" value="<?= $pass->url_id ?>" />
                        <input type="submit" id="hintbutton" name="hintbutton" value="Password Hint" />
                      </form>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="formDiv">
          <div class="inputDiv">
            <form action="./createPassword.php" method="post">
              <input type="hidden" name="url_id" value="<?= $pass->url_id ?>" />
              <input type="submit" id="createPassword" name="createPassword" value="Create New Password" />
            </form>
          </div>
          <form action="./addSharing.php" method="post">
            <div class="inputDiv">
              <input type="submit" class="sharebutton" name="sharebutton" value="Share Passwords" />
            </div>
          </form>
        </div>
  </main>
  <!--global footer-->
  <!--to see if barb can see changes-->
  <?php include "php/footer.php" ?>
</body>

</html>