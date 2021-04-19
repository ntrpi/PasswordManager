<?php

use Codesses\php\Models\{FormProcessor, User, RH};

require_once "./php/Models/User.php";
require_once "./php/Models/FormProcessor.php";
require_once "./php/Models/loginHistory.php";

// Create a helper object.
$userDbHelper = new User;

// Set up the error messages array for use later in the html.
$errorMessages = array();
foreach( User::$loginNames as $input ) {
  $errorMessages[$input] = "";
}

// See if this is a GET or POST request.
$isPost = FormProcessor::isPost( $userDbHelper->getSubmitName() );

if( $isPost ) {

  // Use the FormProcessor to retrieve the values from the form.
  $params = FormProcessor::getValuesObject( User::$loginNames );

  // See if we can find the user name.
  $users = $userDbHelper->getUsersWhere( "user_name", $params->user_name );
  if( $users == null || sizeof( $users) == 0 ) {
    $errorMessages[ "user_name" ] = User::$loginErrorMessages[ "user_name" ];

  } else {
    // There should be only one.
    $user = $users[0];
    if( $user->login_password != password_hash( $params->login_password, PASSWORD_DEFAULT ) ) {
      $errorMessages[ "login_password" ] = User::$loginErrorMessages[ "login_password" ];
    
    } else {
      setUserLoggedIn();
      //addLoginHistory(session variable); *****
      header( "Location: passwords.php?" );
    }
  }
}

?>


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
        <div class="content">
          <div>
            <h2>Log In</h2>
            <div class="formDiv">
              <form action="" method="POST">
                <div class="inputDiv">
                  <div id="user_nameError" class="errorDiv"><?php echo $errorMessages["user_name"]; ?></div>
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
              <p>Not a user yet? <a href="<?php echo 'account.php?a=a1'; ?>">Create an account here.</a></p>
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
  
