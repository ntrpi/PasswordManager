<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Export</title>
    <link rel="stylesheet" href="./css/login.css">
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

        <nav id="accountNav" class="accountNav">
          <ul>
            <li><a href="passwords.html">Passwords</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li><a href="sharing.html">Sharing</a></li>
            <li><a href="import.html">Import</a></li>
            <li><a href="export.html">Export</a></li>
          </ul>
        </nav>
  
        <!-- YOUR STUFF GOES HERE-->
        <div class="content">
          <div>
            <h2>Export Passwords</h2>
            <div class="formDiv">
              <form action="" method="GET">
                <div>
                  <label for="fileOutput" class="fileInputLabel">Choose a File</label>
                  <div class="fileNameDiv"></div>
                  <input class="hidden" id="fileInput" name="fileInput" type="file"/>
                </div>                
                <div class="inputDiv">
                  <input type="submit" value="Export">
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
  
