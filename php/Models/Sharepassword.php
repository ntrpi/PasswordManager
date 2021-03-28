<?php
namespace Codesses\php\Models
{

    Class Sharepassword {

        //method to get all the shared password from the shared password table 
        public function getSharedpassword($dataPdo){
            $sql = "SELECT * FROM shared_passwords";
    
            $pdostm = $dataPdo->prepare($sql);
            $pdostm->execute();
    
            //getting back an ARRAY of shared passwords as an object 
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }

        //function to list all urls shared by a logged in user
        //*******should add in logged in user as a parameter...
        public function listSharedpassword($dataPdo){
            //query to list all urls shared and who it was shared to
            $sql = "SELECT users.user_name, url.url, users.first_name FROM users
            JOIN shared_passwords sp ON users.user_name = sp.owner_id && users.first_name = sp.recipient_id 
            JOIN url ON url.url = sp.url_id";

            $pdostm = $dataPdo->prepare($sql);
            $pdostm->execute();
    
            //below is creating a variable and using the PDO statement to fetch all the data as associative arrays 
            $listSharedpass = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $listSharedpass;

        }

        //function to share a password
        public function shareApassword($dataPdo, $url_id, $owner_id, $recipient_id){
            //add sql query
            $sql = "";

            //we prepare the $psostm means a PDO statment object 
            $pdostm = $dataPdo ->prepare($sql);

            //binding vaules to post variables in the PDO statement
            $pdostm -> bindParam(':url', $url_id);
            $pdostm -> bindParam(':owner', $owner_id);
            $pdostm -> bindParam(':recipient', $recipient_id);

            //to execute the query
            $addSharedpassword = $pdostm ->execute();

            return $addSharedpassword;
            

        }

        //function to update password
        //first get shared password id
        public function getSharedpasswordId($id, $dbconnection) {

            //SQL query with the placeholder
            $sql = "SELECT * FROM shared_passwords WHERE sp_id =:id";
    
            //we prepare and then execute..$psostm means a PDO statment object 
            $pdostm = $dbconnection ->prepare($sql);
    
            //bind the id to pdo statment 
            $pdostm->bindParam(':id', $id);
    
            //to execute the query
            $pdostm ->execute();
    
            //because this is not Add or delete. rather than getting the number of rows effected we want to fetch the data out
            $car = $pdostm->fetch(\PDO::FETCH_OBJ);
    
            //we will initialize all the values from the update
            //testing check: test approved!
            //var_dump($car);
            return $car;
    
            
    
        }





    }
}