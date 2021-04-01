<?php
//Elle's Page
//namespace
use Codesses\php\Models\{DatabaseTwo, Contact};

// require_once 'vendor/autoload.php';
// require_once 'Library/form-functions.php';

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/Contact.php';



$dbconnection = DatabaseTwo::getDb();
$s = new Contact();
$contactMessages =  $s->getAllContactMessages(DatabaseTwo::getDb());

?>
<html lang="en">
<head>
    <!-- Head -->
    <link rel="stylesheet" href="./css/contact.css">
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Home</title>
    <script src="./js/script.js" async defer></script>
</head>

<body>
    <!-- Header -->
    <?php include "php/header.php" ?>
<main>
<div id="listCm">
<h2 style="margin:0;background-color:#562f56;text-align:center;padding:1em;font-size:2em;">List of Contact Messages</h2>
    </div>
    <div>
        <!--    Displaying Data in Table-->
        <table class="content">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">timestamp</th>
            <th scope="col">User</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($contactMessages as $contactMessages) { ?>
            <tr>
                <th><?= $contactMessages->cm_id; ?></th>
                <td><?= $contactMessages->timestamp; ?></td>
                <td><?= $contactMessages->user; ?></td>
                <td><?= $contactMessages->first_name; ?></td>
                <td><?= $contactMessages->last_name; ?></td>
                <td><?= $contactMessages->email; ?></td>
                <td><?= $contactMessages->message; ?></td>
                <td>
                    <form action="./updateContactMessage.php" method="post" style="margin:0;background-color:#562f56;text-align:center;padding:1em;font-size:2em;">
                        <input type="hidden" name="cm_id" value="<?= $contactMessages->cm_id; ?>"/>
                        <input type="submit" class="inputDiv cBox" name="updateContactMessage" value="Update" style="width:9em; height:4em;"/>
                    </form>
                </td>
                <td>
                    <form action="./deleteContactMessage.php" method="post" style="margin:0;background-color:#562f56;text-align:center;padding:1em;font-size:2em;">
                        <input type="hidden" name="cm_id" value="<?=  $contactMessages->cm_id; ?>"/>
                        <input type="submit" class="inputDiv cBox" name="deleteContactMessage" value="Delete" style="width:9em; height:4em;"/>
                    </form>
                </td>
            </tr>
        <?php 
    } ?>
        </tbody>
    </table>
    <div style="margin:0;background-color:#562f56;text-align:center;padding:1em;font-size:2em;">
        <a class="inputDiv cBox" style="padding:0.5em;text-decoration:none;color:black;font-size:0.6em;height:2.5em;" href="./addContactMessage.php" id="btn_addContactMessage" class="btn btn-success btn-lg float-right">Add Contact Message</a>
    </div>
</div>
</main>
<!-- Footer -->
<?php include "php/footer.php"?>
</body>
</html>