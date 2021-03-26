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

    <header>
      <div class="banner">
        <div class="logo">
          <img src="./img/padlock-white-locked-th.png" alt="White padlock, locked.">
        </div>
        <h1 class="siteName">Pass**** Manager</h1>
      </div>

      <div class="borderDiv"></div>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="login.html">Log In</a></li>
          <li><a href="createAccount.html">Sign Up</a></li>
          <li><a href="subscribe.html">Subscribe</a></li>
        </ul>
      </nav>
      <div class="borderDiv"></div>
    </header>

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

    <footer>
      <div class="borderDiv"></div>
      <nav class="footerNav">
        <ul>
          <li><a href="aboutUs.html">About Us</a></li>
          <li><a href="FAQ.html">FAQ</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </nav>
    </footer>
  
  </body>
</html>