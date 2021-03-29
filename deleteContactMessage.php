<?php
//namespace
use Codesses\php\Models\{DatabaseTwo, Contact};

// require_once 'vendor/autoload.php';
// require_once 'Library/form-functions.php';

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/Contact.php';

if(isset($_POST['cm_id'])){
    $id = $_POST['cm_id'];
    $db = DatabaseTwo::getDb();

    $s = new Contact();
    $count = $s->deleteContactMessage($id, $db);
    if($count){
        header("Location: listContactMessages.php");
    }
    else {
        echo " problem deleting";
        /**/ 
    }


}