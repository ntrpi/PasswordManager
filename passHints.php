<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Password Hints</title>
    <link rel="stylesheet" href="./css/passHints.css">
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
      <!--<nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="login.html">Log In</a></li>
          <li><a href="#">Sign Up</a></li>
          <li><a href="subscribe.html">Subscribe</a></li>
        </ul>
      </nav>-->
      <div class="borderDiv"></div>
    </header>

    <main>
        <div class="mainDiv">
            <nav id="accountNav" class="accountNav">
                <ul>
                <li><a href="passwords.html">Passwords</a></li>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="sharing.html">Sharing</a></li>
                <li><a href="import.html">Import</a></li>
                <li><a href="export.html">Export</a></li>
                </ul>
            </nav>
            <!--add or update password hints-->
            <div class="content">
                <h2>Password Hints</h2>
                <form action="" method="POST">
                    <div class="hintDiv">
                        <!--Hint one-->
                        <label for="questionOne">Hint One</label>
                        <input type="text" name="questionOne" id="questionOne" />
                        <label for="answerOne">Answer One</label>
                        <input type="text" name="answerOne" id="answerOne" />

                        <!--Hint two-->
                        <label for="questionTwo">Hint Two</label>
                        <input type="text" name="questionTwo" id="questionTwo" />
                        <label for="answerTwo">Answer Two</label>
                        <input type="text" name="answerTwo" id="answerTwo" />
                        <div>
                        <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
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
  
