<?php
use Codesses\php\Models\{DatabaseTwo, Sharepassword};

require_once "./php/Models/Sharepassword.php";
require_once "./php/Models/DatabaseTwo.php";


if(isset($_POST['deleteSharedPassword'])){
    $sp_id = $_POST['sp_id'];
    $db = DatabaseTwo::getDb();

    $s = new Sharepassword();
    $count = $s->deleteSharedPassword($sp_id, $db);
    if($count){
        header("Location: listSharing.php");
    }
    else {
        echo " problem deleting";
    }


}