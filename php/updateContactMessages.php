<?php
//namespace
use carFiles\Models\{Database, Car};

// require_once 'vendor/autoload.php';
require_once 'Library/form-functions.php';

require_once './Models/Database.php';
require_once './Models/Car.php';

$make = $model = $year = "";
$s = new Car();
$makes = $s->getMakes(Database::getDb());

if(isset($_POST['updateCar'])){
    $id= $_POST['id'];
    $db = Database::getDb();

    $s = new Car();
    $car = $s->getCarById($id, $db);

    $make =  $car->make;
    $model = $car->model;
    $year = $car->year;

}
if(isset($_POST['updCar'])){
    $id= $_POST['sid'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];

    $db = Database::getDb();
    $s = new Car();
    $count = $s->updateCar($id, $make, $model, $year, $db);

    if($count){
    header('Location:  listCars.php');
    } else {
        echo "problem";
    }
}


?>

<html lang="en">

<head>
    <title>Add Car - Car Management System</title>
    <meta make="description" content="Car Management System">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
</head>

<body>

<div>
    <!--    Form to Update  Car -->
    <form action="" method="post">
        <input type="hidden" name="sid" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="make">Make :</label>
            <select name="make" id="make">
                <?php echo populateDropdown($makes) ?>
            </select>
            <span style="color: red">
            </span>
        </div>
        <div class="form-group">
            <label for="model">Model :</label>
            <input type="text" class="form-control" id="model" name="model"
            value="<?= $model; ?>" placeholder="Enter model">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="year">Year :</label>
            <input type="text" name="year" value="<?= $year; ?>" class="form-control"
            id="year" placeholder="Enter year">
            <span style="color: red">

            </span>
        </div>
        <a href="./listCars.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updCar"
                class="btn btn-primary float-right" id="btn-submit">
            Update Car
        </button>
    </form>
</div>


</body>
</html