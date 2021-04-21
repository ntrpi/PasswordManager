<?php
// File created by Barbara Cam 2021/04.
namespace PasswordManager\php\Models;

class profileUser 
{

    public function getUsers($db)
    {
        $query = "SELECT * FROM users";
        
        $pdostm = $db->prepare($query);
        $pdostm->execute();
        //fetch all result
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }

    public function getAllUsers ($user_id, $dbconnection)
    {
        $sql = "SELECT user_id, first_name from users where user_id = :user_id";        
        $pdostm = $dbconnection->prepare($sql);
        $pdostm->bindParam(':user_id', $user_id);
        $pdostm->execute();        
        $profileUsers = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $profileUsers;
    } 




}


?>