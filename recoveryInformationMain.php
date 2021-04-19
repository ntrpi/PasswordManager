<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager recovery read and delete</title>
    <link rel="stylesheet" href="./css/recoveryInformationMain.css">
    <script src="./js/script.js" async defer></script>
  </head>
  <body>
    <!--main nav-->
    <?php include 'php/header.php' ?>
        <main>
            <div class="mainDiv">        
              <!-- YOUR STUFF GOES HERE-->
              <div class="content">
                <div id="optionDiv">
                    <h3>How would you like to recover your personal information?</h3>
                    <div class="options">
                        <a href="./.php" id="btnGoRecovery" class="linkAsButton">Security Questions</a>                
                    </div>                  
                    <div class="options">
                        <a href="./.php" id="btnGoTwoStep" class="linkAsButton">E-mail</a>
                    </div>
                </div>
              </div>
            </div>
          </main>
          <!--global footer-->
           <?php include "php/footer.php"?>
        </body>
      </html>