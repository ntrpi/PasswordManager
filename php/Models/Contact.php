<?php
namespace Codesses\php\Models;

class Contact
{
    public function getUsers($db){
        $query = "SELECT *  FROM users";
        $pdostm = $db->prepare($query);
        $pdostm->execute();

        //fetch all result
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    public function getContactMessageFromUser($db, $user){
        $query = "SELECT users.user_id as user, contact_messages.cm_id, contact_messages.timestamp,contact_messages.first_name, contact_messages.last_name, contact_messages.email, contact_messages.message FROM contact_messages, users where users.user_id = contact_messages.user_id AND user_id = :user";
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':user', $user, \PDO::PARAM_STR);
        $pdostm->execute();
        $s = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $s;
    }
    public function getContactMessageById($id, $db){
        $sql = "SELECT users.user_id as user, contact_messages.cm_id, contact_messages.timestamp, contact_messages.first_name, contact_messages.last_name, contact_messages.email, contact_messages.message FROM contact_messages, users where users.user_id = contact_messages.user_id AND contact_messages.cm_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $s = $pst->fetch(\PDO::FETCH_OBJ);
        return $s;
    }


    public function getAllContactMessages($dbconnection){


        $sql = "SELECT users.user_id as user, contact_messages.cm_id, contact_messages.timestamp, contact_messages.first_name, contact_messages.last_name, contact_messages.email, contact_messages.message FROM contact_messages, users where users.user_id = contact_messages.user_id ";
        $pdostm = $dbconnection->prepare($sql);
        $pdostm->execute();

        $contact_messages = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $contact_messages;
    }
//where to add timestamp
    public function addContactMessage($user, $timestamp, $first_name, $last_name, $email, $message, $db)
    {
        $sql = "INSERT INTO contact_messages (user_id, timestamp, first_name, last_name, email, message) 
        VALUES (:user, :timestamp, :first_name, :last_name, :email, :message) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':user', $user);
        $pst->bindParam(':timestamp', $timestamp);
        $pst->bindParam(':first_name', $first_name);
        $pst->bindParam(':last_name', $last_name);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':message', $message);

        $count = $pst->execute();
        return $count;
    }

    public function deleteContactMessage($id, $db){
        $sql = "DELETE FROM contact_messages WHERE cm_id = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }

    public function updateContactMessage($id, $user, $timestamp, $first_name, $last_name, $email, $message, $db){
        $sql = "UPDATE contact_messages
                SET user_id = :user,
                timestamp = :timestamp,
                first_name = :first_name,
                last_name = :last_name,
                email = :email,
                message = :message
                WHERE cm_id = :id
        ";

        $pst =  $db->prepare($sql);

        $pst->bindParam(':user', $user);
        $pst->bindParam(':timestamp', $timestamp);
        $pst->bindParam(':first_name', $first_name);
        $pst->bindParam(':last_name', $last_name);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':message', $message);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();

        return $count;
    }
};