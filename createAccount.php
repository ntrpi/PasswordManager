<?php

use Codesses\php\Models\{FormProcessor, User};

require_once "./php/Models/User.php";
require_once "./php/Models/FormProcessor.php";

$userObject = new User;
echo $userObject->getSubmitAdd();

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
    <script src="./js/createAccount.js" async defer></script>
    <script src="https://unpkg.com/v8n/dist/v8n.min.js"></script>
  </head>
  <body>

<?php include 'php/header.php' ?>

    <main>
      <div class="mainDiv">
        <div class="content">
          <h2 class="hidden">Create Account</h2>
          <div id="signUpForm" class="formDiv">
            <form name="createAccountForm" action="" method="POST">
              <div id="firstNameError" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="firstName">First name</label>
                <input type="text" name="firstName" id="firstName" />
                <span class="showHideSpan"></span>
              </div>
              <div id="lastNameError" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="lastName">Last name</label>
                <input type="text" name="lastName" id="lastName" />
                <span class="showHideSpan"></span>
              </div>
              <div id="NameError" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="userName">Create a user name</label>
                <input type="text" name="userName" id="userName" />
                <span class="showHideSpan"></span>
              </div>
              <div id="emailError" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" />
                <span class="showHideSpan"></span>
              </div>
              <div id="password1Error" class="errorDiv"></div>
              <div class="inputDiv">
                <label for="password1">Password</label>
                <input type="password" name="password1" id="password1" />
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
  
