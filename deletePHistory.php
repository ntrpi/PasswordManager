<?php
// File created by Barbara Cam 2021/03.

use Codesses\php\Models\{DatabaseTwo, PasswordHistory};

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/PasswordHistory.php';

if(isset($_POST['ph_id'])){
    $id = $_POST['ph_id'];
    $db = DatabaseTwo::getDb();
    $ph = new passwordHistory();
    $count = $ph->deletePasswordHistory($id, $db);
    if($count){
        header("Location: pHistory.php");
        exit;
    }
    else {        
        echo("Problem deleting password history");
        return false;
    }  

}

?>