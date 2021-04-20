<?php
// File created by Barbara Cam 2021/03.

use Codesses\php\Models\{DatabaseTwo, Subscriber};

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/Subscriber.php';

if(isset($_POST['subscriber_id'])){
    $id = $_POST['subscriber_id'];
    $db = DatabaseTwo::getDb();
    $s = new subscriber();
    $count = $s->deleteSubscriber($id, $db);
    if($count){
        header("Location: subscribe.php");
        exit;
    }
    else {
        // echo " problem deleting a subscriber ";
        echo("Problem deleting a subscriber");
        return false;
    }  

}

?>