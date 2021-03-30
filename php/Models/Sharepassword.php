<?php
namespace Codesses\php\Models
{

    Class Sharepassword {

        //method to get all the shared password from the shared password table 
        public function getSharedpassword($db){
            $sql = "SELECT * FROM shared_passwords, users, url";
    
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
    
            //getting back an ARRAY of shared passwords as an object 
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }

        //READ::function to list all urls shared by a logged in user
        //*******should add in logged in user as a parameter...session variable 
        public function listSharedPasswordByUser($db, $user_id){
            //query to list all urls shared and who it was shared to
            $sql = "SELECT users.user_name, url.url, users.first_name FROM users
            JOIN shared_passwords sp ON users.user_name = sp.owner_id && users.first_name = sp.recipient_id 
            JOIN url ON url.url = sp.url_id WHERE sp.owner_id =:user_id";

            $pdostm = $db->prepare($sql);
            $pdostm->bindValue(':user_id', $user_id);
            $pdostm->execute();
    
            //below is creating a variable and using the PDO statement to fetch all the data as associative arrays 
            $listSharedPass = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $listSharedPass;

        }

        //take the var for the logged in session user*****
        //take the value of the url_id uer has clicked on
        //CREATE::function to share a password
        public function shareApassword($db, $url_id, $owner_id, $recipient_id){
            //add sql query
            $sql = "INSERT INTO shared_passwords (url_id, owner_id, recipient_id)
                VALUES (':url_id',':owner_id',':recipient_id')";

            //we prepare the $psostm means a PDO statment object 
            $pdostm = $db ->prepare($sql);

            //binding vaules to post variables in the PDO statement
            $pdostm -> bindParam(':url_id', $url_id);//click on the share button in the passwords page which will pick up the url_id
            $pdostm -> bindParam(':owner_id', $owner_id); //owner_id is the user that is logged in
            $pdostm -> bindParam(':recipient_id', $recipient_id); //populate a drop down on sharePass page which will have the value of user_id (different from the one that is logged in)

            //to execute the query
            $addSharedpassword = $pdostm ->execute();

            return $addSharedpassword;
            

        }
        //recipitentid
        //UPDATE::function to update the user this password is shared to
        //first get shared password id
        public function getSharedPasswordById($sp_id, $db) {
            //SQL query with the placeholder
            $sql = "SELECT * FROM shared_passwords WHERE sp_id =:sp_id";
    
            //we prepare and then execute..$psostm means a PDO statment object 
            $pdostm = $db->prepare($sql);
    
            //bind the id to pdo statment 
            $pdostm->bindParam(':sp_id', $sp_id);
    
            //to execute the query
            $pdostm ->execute();
    
            //because this is not Add or delete. rather getting the number of rows effected we want to fetch the data out
            $sharedPasswordId = $pdostm->fetch(\PDO::FETCH_OBJ);
    
            return $sharedPasswordId;
    
        }
        //another function needed to update password



        //DELETE:: this fuction will delete shareed password
        public function deleteSharedPassword($sp_id, $db){
            //sql to delete shared password
            $sql = "DELETE FROM shared_passwords WHERE sp_id = :sp_id";

            $pdostm = $db->prepare($sql);
            $pdostm->bindParam(':sp_id', $sp_id);
            $deleteSharedPass = $pdostm->execute();
            return $deleteSharedPass;

        }

        //new list function
        public function listallsharepass($dbcon)
        {
            $sql = "SELECT users.user_name, users.first_name, url.url 
                from users inner join url on users.user_id = url.user_id inner join shared_passwords sp on sp.url_id = url.url_id";
            $pdostm = $dbcon->prepare($sql);
            $pdostm->execute();

            $sharepass = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $sharepass;
        } 



    }
}