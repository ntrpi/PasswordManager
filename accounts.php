<?php

use Codesses\php\Models\{FormProcessor, User};

require_once "./php/Models/User.php";
require_once "./php/Models/FormProcessor.php";

// Create a User object to interact with the database.
$userDbHelper = new User;

// Get an array of user objects.
$users = $userDbHelper->getUsers();

?>

<html>
  <head>

    <?php include "php/head.php" ?>

    <title>Pass**** Manager Accounts</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/createAccount.js"></script>
  </head>
  <body>

    <?php include 'php/header.php' ?>

    <main>
        <div class="mainDiv">

            <div class="content">
                <h2>Accounts</h2>
                <div class="contentBox">

                <table class="basicTable">
                <thead>
                    <?php $userDbHelper->getTableHeadersRow( true ); ?>
                </thead>
                <tbody>
                    <?php $userDbHelper->getRowsForUsers(); ?>
                </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include "php/footer.php"?>
  </body>
</html>
  
