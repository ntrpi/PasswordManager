<?php

use Codesses\php\Models\{FormProcessor, User};

require_once "./php/Models/User.php";
require_once "./php/Models/FormProcessor.php";

// Get the action.
$action = "view";
if( isset( $_GET[ "action" ] ) ) {
  $action = $_GET[ "action" ];
}

// Create a User object to help talk to the database and generate html.
$userDbHelper = new User;

// The create and update actions are very similar.
if( $action == "update" || $action == "create" ) {

  $errorMessages = array();
  foreach( User::$inputNames as $input ) {
    $errorMessages[$input] = "";
  }

  $params = null;

  // The biggest difference is that for update, we pre-populate the form.
  if( $action == "update" ) {
    $user_id = $_GET[ "user_id" ];
    $params = $userDbHelper->getUser( $user_id );

  } else {
    $params = User::getParams( User::$inputNames );
  }

  // Use the FormProcessor to check if the form has been submitted.
  // The name of the submit button in the form (see the html below)
  // was set using $userDbHelper->getSubmitAdd(), so we know it will
  // be the same and we don't have to worry about typos.
  if( FormProcessor::isPost( $userDbHelper->getSubmitAdd() ) ) {

    // Use the FormProcessor to retrieve the values from the form.
    $params = FormProcessor::getValuesObject( User::$inputNames );
    // Database::prettyPrintObj( $params );

    // Validate the input. This will reflect what the js validate does,
    // but we can do a bit more because we have access to the database.
    $result = $userDbHelper->validateInput( $params, $action );
    if( $result != null ) {

      // Setting the error message here will cause it to show up in the html.
      // See the divs with class="errorDiv" below.
      $errorMessages[$result] = User::$errorMessages[$result];
    
    } else {
      // Adjust the params for the database.
      $params = $userDbHelper->fixParams( $params, $action );
      // Database::prettyPrintObj( $params );

      if( $action == "update" ) {
        $userDbHelper->updateUser( $params );

        // Check that the values in the database match what we updated.
        $user = $userDbHelper->getUser( $user_id );
        $isSuccess = true;
        foreach( $params as $key=>$value ) {
          if( $params->$key != $user->$key ) {
            $isSuccess = false;
            break;
          }
        }

        if( $isSuccess ) {
          header( "Location: account.php?user_id={$user_id}" );
        } else {
          // Failed.
          // TODO: go to error message.
          echo "Unable to update settings.";
        }
      } else {

        // Add the new user.
        $userDbHelper->createUser( $params );

        // Since we checked ahead of time that the user name is unique,
        // we can confirm that the user was created by get the user
        // with that user name from the database.
        $newUser = $userDbHelper->getUsersWhere( "user_name", $params->user_name );
        if( is_object( $newUser ) ) {
          // Success! 
          header("Location: passwords.php");

        } else {
          // Failed.
          // TODO: go to error message.
          echo "Unable to create account.";
        }
      }
    }
  }
} else if( $action == "delete" ) {

} else {

}

?>

<html>
  <head>

    <?php include "php/head.php" ?>

    <title>Pass**** Manager Create Account</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/createAccount.js"></script>
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
                <input type="submit"  name="<?php echo $userDbHelper->getSubmitAdd(); ?>" value="Sign Up">
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
  
