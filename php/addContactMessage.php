<?php
//namespace
use Codesses\php\Models\{DatabaseTwo, Contact};

// require_once 'vendor/autoload.php';
// require_once 'Library/form-functions.php';

require_once './Models/DatabaseTwo.php';
require_once './Models/Contact.php';


$s = new Contact();
$users = $s->getUsers(DatabaseTwo::getDb());


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
            echo "Added contact message sucessfully";
        } else {
            echo "problem adding a contact message";
        }

    }
?>


<html lang="en">

<head>
    <title>Add Contact Message - Contact Message Management System</title>
    <meta name="description" content="Contact Management System">
    <meta name="keywords" content="Contact, College, Admission, Humber">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
</head>

<body>

<div>
    <!--    Form to Add  Contact Message -->
    <form action="" method="post">

        <div class="form-group">
            <label for="user">User :</label>
            <input type="text" class="form-control" name="user" id="user" value=""
                   placeholder="Enter User">
            <span style="color: red">
            </span>
        </div>
        <div class="form-group">
            <label for="timestamp">timestamp :</label>
            <input type="text" class="form-control" id="timestamp" name="timestamp"
                   value="" placeholder="Enter timestamp">
            <span style="color: red">
            </span>
        </div>
        <div class="form-group">
            <label for="first_name">First Name :</label>
            <input type="text" name="first_name" value="" class="form-control"
                   id="first_name" placeholder="Enter first_name">
            <span style="color: red">
            </span>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name :</label>
            <input type="text" name="last_name" value="" class="form-control"
                   id="last_name" placeholder="Enter last_name">
            <span style="color: red">
            </span>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" name="email" value="" class="form-control"
                   id="email" placeholder="Enter email">
            <span style="color: red">
            </span>
        </div>
        <div class="form-group">
            <label for="message">Message :</label>
            <input type="text" name="message" value="" class="form-control"
                   id="message" placeholder="Enter message">
            <span style="color: red">
            </span>
        </div>
        <a href="./listContactMessages.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addContactMessage"
                class="btn btn-primary float-right" id="btn-submit">
            Add Contact Message
        </button>
    </form>
</div>


</body>
</html