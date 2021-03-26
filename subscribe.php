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
        <!--<nav id="accountNav" class="accountNav">
          <ul>
            <li><a href="crudpasswords.html">Passwords</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="sharing.html">Sharing</a></li>
            <li><a href="#">Import</a></li>
            <li><a href="#">Export</a></li>
          </ul>
        </nav> -->  
        <!-- YOUR STUFF GOES HERE-->
        <div class="content">
          <div>
            <h2 class="hidden">Subscribe</h2>
            <div class="formDiv">
              <form action="" method="POST">
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