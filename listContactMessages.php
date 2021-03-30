<?php
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
    <?php include "php/head.php" ?>
    <title>Pass**** Manager Home</title>
    <link rel="stylesheet" href="#">
    <script src="./js/script.js" async defer></script>
</head>

<body>
    <!-- Header -->
    <?php include "php/header.php" ?>
<main>
<h1 class="h1 text-center">List of Contact Messages</h1>
<div class="m-1">
    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl">
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
                    <form action="./updateContactMessage.php" method="post">
                        <input type="hidden" name="cm_id" value="<?= $contactMessages->cm_id; ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateContactMessage" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="./deleteContactMessage.php" method="post">
                        <input type="hidden" name="cm_id" value="<?=  $contactMessages->cm_id; ?>"/>
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
</main>
<!-- Footer -->
<?php include "php/footer.php"?>
</body>
</html>