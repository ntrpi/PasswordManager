<?php

use Codesses\php\Models\{DatabaseTwo, Password};

require "./php/Models/Crudpassword.php";
require "./php/Models/DatabaseTwo.php";

$dbcon = DatabaseTwo::getDb();
$p = new Password();
$password =  $p->getAllPasswords(DatabaseTwo::getDb());

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
            <thead class="tablehead">
              <tr>
                <th class="tablehead">URL</th>
                <th class="tablehead">Password</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($password as $pass) { ?>
              <tr class="pwTableRow">
                <td><?= $pass['url'] ?></td>
                <td><?= $pass['password'] ?></td>
                <td class="pwButtonsTd">
                  <div class="inputDiv">
                    <input type="submit" class="updatebutton" name="updatebutton" value="Edit" />
                  </div>
                  <div class="inputDiv">
                    <input type="submit" class="deletebutton" name="deletebutton" value="Delete" />
                  </div>
                  <div class="inputDiv">
                    <input type="submit" class="sharebutton" name="sharebutton" value="Share" />
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="inputDiv">
          <input type="submit" class="createbutton" name="createbutton" value="Create New" />
        </div>
      </div>
  </main>
  <!--global footer-->
  <?php include "php/footer.php"?>
</body>

</html>