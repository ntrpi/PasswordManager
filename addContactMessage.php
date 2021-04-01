<?php
//Elle's Page
//namespace
use Codesses\php\Models\{DatabaseTwo, Contact};

// require_once 'vendor/autoload.php';
// require_once 'Library/form-functions.php';

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/Contact.php';


$s = new Contact();
$users = $s->getUsers(DatabaseTwo::getDb());
/* */

    if(isset($_POST['addContactMessage'])){
        $user = $_POST['user'];
        $timestamp = $_POST['timestamp'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $message = $_POST['message'];


        $db = DatabaseTwo::getDb();
        $s = new Contact();
        $c = $s->addContactMessage($user, $timestamp, $first_name, $last_name, $email, $message, $db);


        if($c){
            echo "Added contact message sucessfully";/* */
        } else {
            echo "problem adding a contact message";
        }

    }
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
    
    };
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
<h2 style="margin:0;background-color:#562f56;text-align:center;padding:1em;font-size:2em;">Add Contact Message</h2>
<div>
    <!--    Form to Add  Contact Message -->
    <form action="" method="post">

        <div class="content">
            <label for="user">User :</label>
            <input type="text" class="form-control" id="user" name="user" value=""
            placeholder="Enter User">
        </div>
        <div class="content">
            <label for="timestamp">Time :</label>
            <input type="text" class="form-control" id="timestamp" name="timestamp"
            value="" placeholder="Enter timestamp">
        </div>
        <div class="content">
            <label for="first_name">First Name :</label>
            <input type="text" name="first_name" value="" class="form-control"
            id="first_name" placeholder="Enter first name">
        </div>
        <div class="content">
            <label for="last_name">Last Name :</label>
            <input type="text" name="last_name" value="" class="form-control"
            id="last_name" placeholder="Enter last name">
        </div>
        <div class="content">
            <label for="email">Email :</label>
            <input type="text" name="email" value="" class="form-control"
            id="email" placeholder="Enter email">
            <span style="color: red">
            </span>
        </div>
        <div class="content">
            <label for="message">Message :</label>
            <input type="text" name="message" id="message1" placeholder="Enter message">
        </div>
        <a href="./listContactMessages.php" class="inputDiv cBox">Back</a>
        <button type="submit" name="addContactMessage" id="listCm"
        class="inputDiv cBox">
            Add Contact Message
        </button>
    </form>
</div>
</main>
<!-- Footer -->
<?php include "php/footer.php"?>
</body>
</html