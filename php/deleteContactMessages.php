<?php
//namespace
use carFiles\Models\{Database, Car};

// require_once 'vendor/autoload.php';

require_once './Models/Database.php';
require_once './Models/Car.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $s = new Car();
    $count = $s->deleteCar($id, $db);
    if($count){
        header("Location: listCars.php");
    }
    else {
        echo " problem deleting";
    }


}