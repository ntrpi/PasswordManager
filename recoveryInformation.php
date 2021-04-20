<?php

//// File created by Barbara Cam 2021/04.
use Codesses\php\Models\{DatabaseTwo, Recovery};

require_once "./php/Models/Recovery.php";
require_once "./php/Models/DatabaseTwo.php";

//list the shared recovery information
$dbconnection = DatabaseTwo::getDb();
$r = new recovery();
$recoveries =  $r->getAllRecoveries(DatabaseTwo::getDb());

?>
<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager recovery read and delete</title>
    <link rel="stylesheet" href="./css/recoveryInformation.css">
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
                  <h2 class="hidden">Recovery Questions</h2>                   
                  <div class="formDiv">            
                    <table class="basicTable">
                      <thead>
                        <th>Answer ID</th>
                        <th>Username</th>
                        <th>Question</th>
                        <th>Answer</th>                                          
                      </thead>
                      <tbody>
                      <?php foreach($recoveries as $recovery) { ?>
                        <tr>
                          <td><?= $recovery->id; ?></td>
                          <td><?= $recovery->uname; ?></td>
                          <td><?= $recovery->question; ?></td>
                          <td><?= $recovery->answer; ?></td>                                                                 
                          <td>
                            <form action="./updateRecovery.php" method="post">
                              <input type="hidden" name="sa_id" value="<?= $recovery->id; ?>"/>
                              <input type="submit" class="backLink" name="updateRecovery" value="Update"/>
                            </form>
                          </td>
                          <td>
                            <form action="./deleteRecovery.php" method="post">
                              <input type="hidden" name="sa_id" value="<?= $recovery->id; ?>"/>
                              <input type="submit" class="backLink" name="deleteRecovery" value="Delete"/>
                            </form>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div id="addDiv">
                      <a href="./addRecovery.php" id="btnAddRecovery" class="linkAsButton">Add</a>
                    </div>
                  </div>                
                </div>
              </div>
            </div>
          </main>
          <!--global footer-->
           <?php include "php/footer.php"?>
        </body>
      </html>