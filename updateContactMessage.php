<?php
    //Elle

    use PasswordManager\php\Models\{DatabaseTwo, Contact};

    // require_once 'vendor/autoload.php';
    // require_once 'Library/form-functions.php';

    require_once './php/Models/DatabaseTwo.php';
    require_once './php/Models/Contact.php';

    $user = $timestamp = $first_name = $last_name = $email = $message = "";
    $s = new Contact();
    $users = $s->getUsers(DatabaseTwo::getDb());

    if(isset($_POST['updateContactMessage'])){
        $id= $_POST['cm_id'];
        $db = DatabaseTwo::getDb();

        $s = new Contact();
        $contactMessages = $s->getContactMessageById($id, $db);
        // var_dump($contactMessages);
        $user =  $contactMessages->user;
        $timestamp = $contactMessages->timestamp;
        $first_name = $contactMessages->first_name;
        $last_name = $contactMessages->last_name;
        $email = $contactMessages->email;
        $message = $contactMessages->message;
    };
    if(isset($_POST['updateContactMessages2'])){
        // var_dump($_POST);
        $id= $_POST['sid'];
        $user = $_POST['user'];
        $timestamp = $_POST['timestamp'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // var_dump($id);
        // var_dump($user);
        $db = DatabaseTwo::getDb();
        $s = new Contact();
        $count = $s->updateContactMessage($id, $user, $timestamp, $first_name, $last_name, $email, $message, $db);

        if($count){
            header('Location:  listContactMessages.php');
            exit;
        } else {
            echo "problem";
        }
    };
    if(isset($_POST['submit'])) {
        $emailerr = "";
        $nameerr = "";
        $lasterr = "";
        $usererr = "";
        $timestamperr = "";
        $messageerr = "";
        $user = $_POST['user'];
        $timestamp = $_POST['timestamp'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        if($email == ""){
            $emailerr = "please enter email";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "please enter a valid email";
        } else {
            $emailerr = " That's a valid email";
        }
        if(empty($user)) {
            $usererr = " Please enter name";
        }
        if(empty($timestamp)) {
            $timestamperr = " Please enter name";
        }
        if(empty($first_name)) {
            $nameerr = " Please enter name";
        }
        if(empty($last_name)) {
            $lasterr = " Please enter name";
        }
        if(empty($message)) {
            $messageerr = " Please enter name";
        }
    }
?>

<html lang="en">

    <head>
        <!-- Head -->
        <?php include "php/head.php" ?>
        <title>Pass**** Manager Home</title>
        <link rel="stylesheet" href="./css/contact.css">
        <script src="./js/script.js" async defer></script>
    </head>

    <body>
        <!-- Header -->
        <?php include "php/header.php" ?>
        <main>
        <h2 style="margin:0;background-color:#562f56;text-align:center;padding:1em;font-size:2em;">Update Contact Message</h2>
            <div>
                <!--    Form to Update  Contact Message -->
                <form action="" method="post" name="theformname">
                    <input type="hidden" name="sid" value="<?= $id; ?>" />
                    <div class="content">
                        <label for="user">User</label>
                        <input type="text" name="user" id="user" value="<?= isset($user) ? $user : ''; ?>" placeholder="Enter User">
                        <span style="color: red"><?= isset($usererr)? $usererr: ''; ?></span>
                    </div>
                    <div class="content">
                        <label for="timestamp">Time</label>
                        <input type="text" id="timestamp" name="timestamp" value="<?= isset($timestamp) ? $timestamp : ''; ?>" placeholder="Enter Time">
                        <span style="color: red"><?= isset($timestamperr)? $timestamperr: ''; ?></span>
                    </div>
                    <div class="content">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="<?= isset($first_name) ? $first_name : ''; ?>" id="first_name" placeholder="Enter First Name">
                        <span style="color: red"><?= isset($nameerr)? $nameerr: ''; ?></span>
                    </div>
                    <div class="content">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" value="<?= isset($last_name) ? $last_name : ''; ?>" id="last_name" placeholder="Enter Last Name">
                        <span style="color: red"><?= isset($lasterr)? $lasterr: ''; ?></span>
                    </div>
                    <div class="content">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="<?= isset($email) ? $email : ''; ?>" id="email" placeholder="Enter Email">
                        <span style="color: red"><?= isset($emailerr)? $emailerr: ''; ?></span>
                    </div>
                    <div class="content">
                        <label for="message">Message</label>
                        <input type="text" name="message" value="<?= isset($message) ? $message : ''; ?>" id="message1" placeholder="Enter Message">
                        <span style="color: red"><?= isset($messageerr)? $messageerr: ''; ?></span>
                    </div>
                    <div style="display:flex;background-color:#562f56;text-align:center;padding:2% 37%;">
                        <a href="./listContactMessages.php" class="content linkAsButton inputDiv" style="padding:0.8em;text-decoration:none;color:black;width:8em;height:3em;font-weight:inherit;">Back</a>
                        <button type="submit"  class="content cBox" name="updateContactMessages2" style="text-decoration:none;color:black;width:9em;height:4em;font-size:initial;margin-top:0.4em;">Update</button>
                    </div>
                </form>
            </div>
        </main>
        <!-- Footer -->
        <?php include "php/footer.php"?>
    </body>
</html>