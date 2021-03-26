<!DOCTYPE html>
<html>
  <head>
    <!--global head.php-->
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Log In</title>
    <link rel="stylesheet" href="./css/login.css">
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
            <h2 class="hidden">Log In</h2>
            <!-- <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut<strong>Wafa made some changes her
              </strong> labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p> -->
            <div class="formDiv">
              <form action="" method="POST">
                <div class="inputDiv">
                  <label for="userName">User name</label>
                  <input type="text" name="userName" id="userName" />
                </div>
                <div class="inputDiv">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" />
                </div>
                <div class="inputDiv">
                  <input type="submit" value="Log In">
                </div>  
              </form>
            </div>
            <div>
              <p>Not a user yet? <a href="signUp.html">Create an account here.</a></p>
            </div>
          </div>
          <div>
            <a href="recovery.html">Forgot your password?</a>
          </div>
        </div>
      </div>
    </main>
    <!--global footer-->
    <?php include "php/footer.php"?>
  </body>
</html>
  
