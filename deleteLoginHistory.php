<?php
    //Elle
    use PasswordManager\php\Models\{DatabaseTwo, LoginHistory};

    // require_once 'vendor/autoload.php';
    // require_once 'Library/form-functions.php';

    require_once './php/Models/DatabaseTwo.php';
    require_once './php/Models/LoginHistory.php';

    if(isset($_POST['lh_id'])){

        $id = $_POST['lh_id'];
        $db = DatabaseTwo::getDb();
        $s = new LoginHistory($db);
        $count = $s->deleteLoginHistory($id);
        
        if($count){
            header("Location: listLoginHistory.php");
            exit;
        }
        else {
            echo " problem deleting";
        }
    }
?>