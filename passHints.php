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
<!--global footer-->
<?php include "php/footer.php"?>
  </body>
</html>
  
