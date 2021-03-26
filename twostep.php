<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Home</title>
    <link rel="stylesheet" href="./css/twostep.css">
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
            <h2>Two Step Verification</h2>
            <div>
                <p>Please enter the code was sent to your email or phone</p>
            </div>
            <form action="#" method="GET" class="twostepform">
              <div class="inputDiv">
              <input type="text" class="twostepbar" name="twostepbar">
              <input type="submit" class="linkAsButton" name="searchbutton" value="Enter Code"/>
            </div>
            </form>
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
