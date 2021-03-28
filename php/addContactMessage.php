<?php
//namespace
use Codesses\php\Models\{DatabaseTwo, Contact};

// require_once 'vendor/autoload.php';
require_once 'Library/form-functions.php';

require_once './Models/DatabaseTwo.php';
require_once './Models/Contact.php';


$s = new Contact();
$makes = $s->getMakes(DatabaseTwo::getDb());


    if(isset($_POST['addCar'])){
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];


        $db = DatabaseTwo::getDb();
        $s = new Contact();
        $c = $s->addCar($make, $model, $year, $db);


        if($c){
            echo "Added car sucessfully";
        } else {
            echo "problem adding a car";
        }

    }
?>


<html lang="en">

<head>
    <title>Add Contact - Contact Management System</title>
    <meta name="description" content="Contact Management System">
    <meta name="keywords" content="Contact, College, Admission, Humber">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
</head>

<body>

<div>
    <!--    Form to Add  Contact -->
    <form action="" method="post">

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
                   value="" placeholder="Enter model">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="year">Year :</label>
            <input type="text" name="year" value="" class="form-control"
                   id="year" placeholder="Enter Year">
            <span style="color: red">

            </span>
        </div>
        <a href="./listCars.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addCar"
                class="btn btn-primary float-right" id="btn-submit">
            Add Contact
        </button>
    </form>
</div>


</body>
</html