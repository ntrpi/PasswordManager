<?php

use Codesses\php\Models\{FormProcessor, User, RH};

require_once "./php/Models/User.php";
require_once "./php/Models/FormProcessor.php";

// Create a helper object.
$userDbHelper = new User;

// See if this is a GET or POST request.
$isPost = FormProcessor::isPost( $userDbHelper->getSubmitName() );

// Set up the error messages array for use later in the html.
$errorMessages = array();
foreach( User::$inputNames as $input ) {
  $errorMessages[$input] = "";
}

// $params are used in the html below.
$params = null;

// This might be set.
$user_id = RH::getValue( RH::$id );

// Get the action from the routing into.
$action = RH::getValue( RH::$action );

if( $isPost ) {

  // Use the FormProcessor to retrieve the values from the form.
  $params = FormProcessor::getValuesObject( User::$inputNames );

  // Validate the input. This will reflect what the js validate does,
  // but we can do a bit more because we have access to the database.
  $result = $userDbHelper->validateInput( $params, $action );
  if( $result != null ) {

    // Setting the error message here will cause it to show up in the html.
    // See the divs with class="errorDiv" below.
    $errorMessages[$result] = User::$errorMessages[$result];

  } else {
    if( !RH::isCreate( $action ) ) {
      $params->user_id = $user_id;
    }

    // Sometimes we don't get useful return values from the database.
    // The best way to check that a new user has been added is to check
    // that the number of users after adding the user has increased.
    // *NOTE: in a large system this won't work because someone might
    // delete a user after you get the number of users before adding
    // yours. But it will do for now.

    // Adjust the params for the database.
    $params = $userDbHelper->fixParams( $params, $action );

    $userDbHelper->doAction( $action, $params );

    // Check that the values in the database match what we updated.
    $user = $userDbHelper->getUsersWhere( "user_name", $params->user_name )[0];
    
    $isSuccess = true;
    foreach( $params as $key=>$value ) {
        if( $params->$key != $user->$key ) {
        $isSuccess = false;
        break;
        }
    }

    if( $isSuccess ) {
      if( RH::isCreate( $action ) ) {
        header( "Location: passwords.php?" );
      } else {
        header( "Location: accounts.php?" );
      }
    } else {
        // Failed.
        // TODO: go to error message.
        echo "Unable to update settings.";
        exit();
    }

  }

} else {
  if( RH::isCreate( $action ) ) {
    $params = $userDbHelper->getParams( User::$createInputNames );
  } else {
    $params = $userDbHelper->getUser( $user_id );
    unset( $params->login_password );
    unset( $params->password2 );
  }
}

?>

<html>
  <head>

    <?php include "php/head.php" ?>

    <title>Pass**** Manager Create Account</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://unpkg.com/v8n/dist/v8n.min.js"></script>
    <script src="./js/account.js"></script>
  </head>
  <body>
    <!--main nav-->
    <?php include 'php/header.php' ?>
    <main>
      <div class="mainDiv">
        <div class="content">
          <h2 class="hidden">Create Account</h2>
          <div id="signUpForm" class="formDiv">
            <form name="accountForm" action="" method="POST">
              <div id="first_nameError" class="errorDiv"><?php echo $errorMessages["first_name"]; ?></div>
              <div class="inputDiv">
                <label for="first_name">First name</label>
                <input type="text" name="first_name" id="first_name" value="<?php echo $params->first_name; ?>" />
                <span class="showHideSpan"></span>
              </div>
              <div id="last_nameError" class="errorDiv"><?php echo $errorMessages["last_name"]; ?></div>
              <div class="inputDiv">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" value="<?php echo $params->last_name; ?>"/>
                <span class="showHideSpan"></span>
              </div>
              <div id="user_nameError" class="errorDiv"><?php echo $errorMessages["user_name"]; ?></div>
              <div class="inputDiv">
                <label for="user_name">Create a user name</label>
                <input type="text" name="user_name" id="user_name" value="<?php echo $params->user_name; ?>"/>
                <span class="showHideSpan"></span>
              </div>
              <div id="emailError" class="errorDiv"><?php echo $errorMessages["email"]; ?></div>
              <div class="inputDiv">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $params->email; ?>" />
                <span class="showHideSpan"></span>
              </div>
              <div id="login_passwordError" class="errorDiv"><?php echo $errorMessages["login_password"]; ?></div>
              <div class="inputDiv">
                <label for="login_password">Password</label>
                <input type="password" name="login_password" id="login_password" value="<?php echo $params->login_password; ?>" />
                <span class="showHideSpan">Show</span>
              </div>

              <!-- This div will only show up if the error message is set above. -->
              <div id="password2Error" class="errorDiv"><?php echo $errorMessages["password2"]; ?></div>
              <div class="inputDiv">
                <label for="password2">Repeat password</label>
                <input type="password" name="password2" id="password2" value="<?php echo $params->password2; ?>"/>
                <span class="showHideSpan">Show</span>
              </div>
              <div class="inputDiv">

              <!-- Note that I am setting the name of the submit input to be the same as what the
                  FormProcessor is checking for. -->
                <input type="submit"  name="<?php echo $userDbHelper->getSubmitName(); ?>" value="Sign Up">
              </div>  
            </form>
          </div>
      </div>
      </div>
    </main>
<!--global footer-->
<?php include "php/footer.php"?>
  </body>
</html>