<?php

use Codesses\php\Models\{DatabaseTwo, Password};

require "./php/Models/Crudpassword.php";
require "./php/Models/DatabaseTwo.php";

if (isset($_POST['deletebutton'])) {
    $id = $_POST['url_id'];
    $db = DatabaseTwo::getDb();

    $s = new Password();
    $count = $s->deletePassword($id, $db);
    if ($count) {
        header("Location: listPasswords.php");
        exit;
    } else {
        echo " problem deleting";
    }
}