<?php

// File created by Barbara Cam 2021/04.

use Codesses\php\Models\{DatabaseTwo, Recovery};

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/Recovery.php';

if(isset($_POST['sa_id'])){
    $id = $_POST['sa_id'];
    $db = DatabaseTwo::getDb();
    $r = new recovery();
    $count = $r->deleteRecovery($id, $db);
    if($count){
        header("Location: recoveryInformation.php");
        return false;
    }
    else {
        // echo " problem deleting recovering ";
        echo("Problem deleting recovering information");
        return false;
    }  

}

?>