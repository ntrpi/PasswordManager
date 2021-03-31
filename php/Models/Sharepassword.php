<?php
namespace Codesses\php\Models
{

    Class Sharepassword {

        //method to get all the shared password from the shared password table 
        public function getSharedpassword($db){
            $sql = "SELECT * FROM shared_passwords";
    
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
    
            //getting back an ARRAY of shared passwords as an object 
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }

        //LIST::function without session user id
        //change url user id to session variable
        public function listSharedpassword($dbcon)
        {
            $sql = "SELECT sp_id, users.user_name, users.first_name, url.url, url.password FROM shared_passwords sp
            inner join url on sp.url_id = url.url_id inner join users on url.user_id = users.user_id";
            $pdostm = $dbcon->prepare($sql);
            $pdostm->execute();

            $sharepass = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $sharepass;
        }

        //ADD:: share a password 
        //get all users
        public function getAllusers($db){
            $sql = "SELECT * FROM users";

            $pdostm = $db->prepare($sql);
            $pdostm->execute();
    
            //getting back an ARRAY of shared passwords as an object 
            $allUsers = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $allUsers;

        }
        //get all url
        public function getAllurl($db){
            $sql = "SELECT * FROM url";

            $pdostm = $db->prepare($sql);
            $pdostm->execute();
    
            //getting back an ARRAY of shared passwords as an object 
            $allUrl = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $allUrl;
        }
        //take the var for the logged in session user*****
        //function to share a password
        public function sharePassword($url_id, $owner_id, $recipient_id, $db){
            //add sql query
            $sql = "INSERT INTO shared_passwords (url_id, owner_id, recipient_id)
                VALUES (:url, :owner, :recipient)";

            //we prepare the $psostm means a PDO statment object 
            $pdostm = $db->prepare($sql);

            //binding vaules to post variables in the PDO statement
            $pdostm->bindParam(':url', $url_id);//click on the share button in the passwords page which will pick up the url_id
            $pdostm->bindParam(':owner', $owner_id); //owner_id is the user that is logged in
            $pdostm->bindParam(':recipient', $recipient_id); //populate a drop down on sharePass page which will have the value of user_id (different from the one that is logged in)

            //to execute the query
            $count = $pdostm->execute();

            return $count;
            

        }
        
        //UPDATE::function to update the user this password is shared to
        //first get shared password id
        public function getSharedPasswordById($sp_id, $db) {
            //SQL query with the placeholder
            $sql = "SELECT sp_id, users.user_name, users.first_name, url.url, url.password FROM shared_passwords sp
            inner join url on sp.url_id = url.url_id inner join users on url.user_id = users.user_id WHERE sp_id =:sp_id";
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


    }
}

