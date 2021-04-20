<?php

// File created by Barbara Cam 2021/04.
use Codesses\php\Models\{DatabaseTwo, PasswordHistory};

require_once "./php/Models/PasswordHistory.php";
require_once "./php/Models/DatabaseTwo.php";

//list the shared recovery information
$dbconnection = DatabaseTwo::getDb();
$ph = new passwordHistory();
$phistories =  $ph->getAllPasswordHistory(DatabaseTwo::getDb());

?>
<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Password History</title>
    <link rel="stylesheet" href="./css/pHistory.css">
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
                  <h2 class="hidden">Password History</h2>                   
                  <div class="formDiv">            
                    <table>
                      <thead>
                        <th>URL</th>
                        <th>Action</th>
                        <th>Old Pass**</th>
                        <th>New Pass**</th>
                        <th>Old Hint</th>
                        <th>New Hint</th>
                        <th>TimeStamp</th>
                      </thead>
                     <tbody>
                     <?php foreach($phistories as $phistory) { ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <form action="" method="post">
                              <input type="hidden" name="id" value=""/>
                              <input type="submit" class="phDelete" name="deleteHistory" value="delete"/>
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