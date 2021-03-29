<?php

use Codesses\php\Models\{DatabaseTwo, Subscriber};
//require_once 'vendor/autoload.php';

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/Subscriber.php';

if(isset($_POST['subscriber_id'])){
    $id = $_POST['subscriber_id'];
    $db = DatabaseTwo::getDb();

    $s = new subscriber();
    $count = $s->deleteSubscriber($id, $db);
    if($count){
        header("Location: subscribe.php");
        return false;
    }
    else {
        // echo " problem deleting a subscriber ";
        header("Location: addSubscriber.php");
        return false;
    }
    

}

?>