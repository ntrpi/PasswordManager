<?php
//namespace
use Codesses\php\Models\{DatabaseTwo, Contact};

// require_once 'vendor/autoload.php';
// require_once 'Library/form-functions.php';

require_once './Models/DatabaseTwo.php';
require_once './Models/Contact.php';



$dbcon = DatabaseTwo::getDb();
$s = new Contact();
$contactMessages =  $s->getAllContactMessages(DatabaseTwo::getDb());

?>
<html lang="en">
<head>
    <title>Humber</title>
    <meta name="description" content="Contact Management System">
    <!-- <meta name="keywords" content="Contact, College, Admission, Humber"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<p class="h1 text-center">Contact Management System</p>
<div class="m-1">
    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User</th>
            <th scope="col">timestamp</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contactMessages as $contactMessages) { ?>
            <tr>
                <th><?= $contactMessages->id; ?></th>
                <td><?= $contactMessages->timestamp; ?></td>
                <td><?= $contactMessages->first_name; ?></td>
                <td><?= $contactMessages->last_name; ?></td>
                <td><?= $contactMessages->email; ?></td>
                <td><?= $contactMessages->message; ?></td>
                <td>
                    <form action="./updateContactMessage.php" method="post">
                        <input type="hidden" name="id" value="<?= $contactMessages->id; ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateContactMessage" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="./deleteContactMessage.php" method="post">
                        <input type="hidden" name="id" value="<?=  $contactMessages->id; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteContactMessage" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php 
    } ?>
        </tbody>
    </table>
    <a href="./addContactMessage.php" id="btn_addContactMessage" class="btn btn-success btn-lg float-right">Add Contact Message</a>

</div>
</body>
</html>