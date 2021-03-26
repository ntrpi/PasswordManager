<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Import</title>
    <link rel="stylesheet" href="./css/login.css">
    <script src="./js/script.js" async defer></script>
  </head>
  <body>
<!--main nav-->
<?php include 'php/header.php' ?>
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
            <h2>Import Passwords</h2>
            <div class="formDiv">
              <form action="" method="POST">
                <div>
                  <label for="fileInput" class="fileInputLabel">Choose a File</label>
                  <div class="fileNameDiv"></div>
                  <input class="hidden" id="fileInput" name="fileInput" type="file"/>
                </div>                
                <div class="inputDiv">
                  <input type="submit" value="Upload">
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
  
