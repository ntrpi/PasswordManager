<?php
// File created by Barbara Cam 2021/03.
namespace Codesses\php\Models;

class Subscriber 
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

    public function getSubscribersByUser($db, $user)
    {
        $query = "SELECT users.user_name as uname, users.first_name as fname, users.last_name as lname, subscribers.frequency, subscribers.user_id as user FROM subscribers, users where subscribers.user_id = users.user_id AND subscribers.user_id = :user";
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':user', $user, \PDO::PARAM_STR);
        $pdostm->execute();
        $s = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $s;
    }

    public function getSubscriberById($id, $db)
    {
        $sql = "SELECT users.user_name as uname, users.first_name as fname, users.last_name as lname, subscribers.frequency, subscribers.user_id as user FROM users, subscribers WHERE subscribers.user_id = users.user_id AND subscribers.subscriber_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();        
        $s = $pst->fetch(\PDO::FETCH_OBJ);
        return $s;
    }


    public function getAllSubscribers($dbconnection)
    {
        $sql = "SELECT users.user_name as uname, users.first_name as fname, users.last_name as lname, subscribers.subscriber_id, subscribers.frequency, subscribers.user_id as user FROM users, subscribers where users.user_id = subscribers.user_id ";
        $pdostm = $dbconnection->prepare($sql);
        $pdostm->execute();
        $subscribers = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $subscribers;
    }   

    public function addSubscriber($user, $frequency, $db)
    {
    $sql = "INSERT INTO subscribers(user_id, frequency) values (:user, :frequency)";

        $pst = $db->prepare($sql);        
        $pst->bindParam(':user', $user);
        $pst->bindParam(':frequency', $frequency);
        $count = $pst->execute();
        return $count;
    }

    public function deleteSubscriber($id, $db)
    {
        $sql = "DELETE FROM subscribers WHERE subscriber_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
    public function updateSubscriber($id, $user, $frequency, $db)
    {
        $sql = "UPDATE subscribers
                set user_id = :user,
                frequency = :frequency            
                WHERE subscriber_id = :id";

        $pst =  $db->prepare($sql);
        $pst->bindParam(':user', $user);
        $pst->bindParam(':frequency', $frequency);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }

}

?>