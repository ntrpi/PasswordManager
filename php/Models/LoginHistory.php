<?php
    // Elle
    
    namespace PasswordManager\php\Models;
    use PDO;
    class LoginHistory
    {
        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function getUsers(){
            $sql = "SELECT *  FROM users";
            $pdostm = $this->db->prepare($sql);
            $pdostm->execute();

            //fetch all result
            $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }
        public function getLoginHistoryFromUser($user){
            $sql = "SELECT users.user_id as user, login_history.lh_id, login_history.timestamp,login_history.action FROM login_history, users where users.user_id = login_history.user_id AND user_id = :user";
            $pdostm = $this->db->prepare($sql);
            $pdostm->bindValue(':user', $user, PDO::PARAM_STR);
            $pdostm->execute();
            $s = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $s;
        }
        public function getLoginHistoryById($id){
            $sql = "SELECT * FROM login_history where user_id = :id";
            $pdostm = $this->db->prepare($sql);
            $pdostm->bindParam(':id', $id);
            $pdostm->execute();
            $s = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $s;
        }
        public function getAllLoginHistory(){
            $sql = "SELECT users.user_id as user, login_history.lh_id, login_history.timestamp, login_history.action FROM login_history, users where users.user_id = login_history.user_id ";
            $pdostm = $this->db->prepare($sql);
            $pdostm->execute();
            $login_history = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $login_history;
        }
        public function addLoginHistory($user, $timestamp, $action)
        {
            $sql = "INSERT INTO login_history (user_id, timestamp, action) 
            VALUES (:user, :timestamp, :action) ";
            $pdostm = $this->db->prepare($sql);
            $pdostm->bindParam(':user', $user);
            $pdostm->bindParam(':timestamp', $timestamp);
            $pdostm->bindParam(':action', $action);
            $count = $pdostm->execute();
            return $count;
        }
        public function deleteLoginHistory($id){
            $sql = "DELETE FROM login_history WHERE lh_id = :id";
            $pdostm = $this->db->prepare($sql);
            $pdostm->bindParam(':id', $id);
            $count = $pdostm->execute();
            return $count;
        }
        // public function updateLoginHistory($id, $user, $timestamp, $action, $db){
        //     $sql = "UPDATE login_history
        //         SET user_id = :user,
        //         timestamp = :timestamp,
        //         action = :action
        //         WHERE lh_id = :id";

        //     $pdostm =  $db->prepare($sql);
        //     $pdostm->bindParam(':user', $user);
        //     $pdostm->bindParam(':timestamp', $timestamp);
        //     $pdostm->bindParam(':action', $action);
        //     $pdostm->bindParam(':id', $id);
        //     $count = $pdostm->execute();

        //     return $count;
        // }
    };
?>