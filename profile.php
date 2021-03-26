<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Profile</title>
    <link rel="stylesheet" href="./css/profile.css">
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
            <li><a href="#">Profile</a></li>
            <li><a href="sharing.html">Sharing</a></li>
            <li><a href="import.html">Import</a></li>
            <li><a href="export.html">Export</a></li>
          </ul>
        </nav>
  

        <div class="content">
          <div>
            <h2>Profile</h2>
            <div class="contentBox">
              <div class="cBox">
                <img src="./img/profile-icon.png" alt="empty image" />
                <h3>Georgia</h3>
                <p>Member since 2005</p>
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


