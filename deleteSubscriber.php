<?php

use Codesses\php\Models\{DatabaseTwo, Subscriber};
//require_once 'vendor/autoload.php';

require_once './php/Models/DatabaseTwo.php';
require_once './php/Models/Subscriber.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = DatabaseTwo::getDb();

    $s = new subscriber();
    $count = $s->deleteSubscriber($id, $db);
    if($count){
        header("Location: subscribe.php");
    }
    else {
        // echo " problem deleting a subscriber ";
        header("Location: addSubscriber.php");
    }


}

?>