<?php
use Codesses\php\Models\{DatabaseTwo, FAQ};
require "./php/Models/FAQ.php";
require "./php/Models/DatabaseTwo.php";



if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = DatabaseTwo::getDb();

    $s = new FAQ();
    $count = $s->deleteFAQ($id, $db);
    if($count){
        header("Location: list-cars.php");
    }
    else {
        echo " problem deleting";
    }


}