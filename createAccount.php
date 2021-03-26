<?php

use Codesses\php\Models\{FormProcessor, User};

require_once "./php/Models/User.php";
require_once "./php/Models/FormProcessor.php";

$userObject = new User;

if( FormProcessor::isPost( $userObject->getSubmitAdd() ) ) {

  $params = FormProcessor::getValuesObject( User::$columnNames );
  var_dump( $params );

  $numUsers = $userObject->getNumUsers();
  $userObject->createUser( $params );

  if( $numUsers != $userObject->getNumUsers() ) {
    header("Location: index.php");
  } else {
    echo "Unable to create account.";
  }
}
?>

<html>
  <head>

    <?php include "php/head.php" ?>

    <title>Pass**** Manager Create Account</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

<?php include 'php/header.php' ?>

    <main>
      <div class="mainDiv">
        <div class="content">
          <h2 class="hidden">Create Account</h2>
          <div id="signUpForm" class="formDiv">
            <form name="createAccountForm" action="" method="POST">
              <div id="first_nameError" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="first_name">First name</label>
                <input type="text" name="first_name" id="first_name" />
                <span class="showHideSpan"></span>
              </div>
              <div id="last_nameError" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" />
                <span class="showHideSpan"></span>
              </div>
              <div id="NameError" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="user_name">Create a user name</label>
                <input type="text" name="user_name" id="user_name" />
                <span class="showHideSpan"></span>
              </div>
              <div id="emailError" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" />
                <span class="showHideSpan"></span>
              </div>
              <div id="login_passwordError" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="login_password">Password</label>
                <input type="password" name="login_password" id="login_password" />
                <span class="showHideSpan">Show</span>
              </div>
              <div id="password2Error" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="password2">Repeat password</label>
                <input type="password" name="password2" id="password2" />
                <span class="showHideSpan">Show</span>
              </div>
              <div class="inputDiv">
                <input type="submit"  name="<?php echo $userObject->getSubmitAdd(); ?>" value="Sign Up">
              </div>  
            </form>
          </div>
          <div id="signUpSuccess" style="display: none">
            <p>Account created! <a href="login.html">Click here to log in.</a></p>
          </div>
      </div>
      </div>
    </main>

<?php include "php/footer.php" ?>

  </body>
</html>
  
