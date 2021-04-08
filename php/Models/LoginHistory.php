<?php
    // Elle
    
    namespace Codesses\php\Models;

    class LoginHistory
    {
        public function getUsers($db){
            $query = "SELECT *  FROM users";
            $pdostm = $db->prepare($query);
            $pdostm->execute();

            //fetch all result
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }
        public function getLoginHistoryFromUser($db, $user){
            $query = "SELECT users.user_id as user, login_history.lh_id, login_history.timestamp,login_history.action FROM login_history, users where users.user_id = login_history.user_id AND user_id = :user";
            $pdostm = $db->prepare($query);
            $pdostm->bindValue(':user', $user, \PDO::PARAM_STR);
            $pdostm->execute();
            $s = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $s;
        }
        public function getLoginHistoryById($id, $db){
            $sql = "SELECT users.user_id as user, login_history.lh_id, login_history.timestamp, login_history.action FROM login_history, users where users.user_id = login_history.user_id AND login_history.lh_id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $pst->execute();
            $s = $pst->fetch(\PDO::FETCH_OBJ);
            return $s;
        }
        public function getAllLoginHistory($dbconnection){
            $sql = "SELECT users.user_id as user, login_history.lh_id, login_history.timestamp, login_history.action FROM login_history, users where users.user_id = login_history.user_id ";
            $pdostm = $dbconnection->prepare($sql);
            $pdostm->execute();
            $login_history = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $login_history;
        }
        public function addLoginHistory($user, $timestamp, $action, $db)
        {
            $sql = "INSERT INTO login_history (user_id, timestamp, action) 
            VALUES (:user, :timestamp, :action) ";
            $pst = $db->prepare($sql);
            $pst->bindParam(':user', $user);
            $pst->bindParam(':timestamp', $timestamp);
            $pst->bindParam(':action', $action);
            $count = $pst->execute();
            return $count;
        }
        public function deleteLoginHistory($id, $db){
            $sql = "DELETE FROM login_history WHERE lh_id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();
            return $count;
        }
        public function updateLoginHistory($id, $user, $timestamp, $action, $db){
            $sql = "UPDATE login_history
                SET user_id = :user,
                timestamp = :timestamp,
                action = :action
                WHERE lh_id = :id";

            $pst =  $db->prepare($sql);
            $pst->bindParam(':user', $user);
            $pst->bindParam(':timestamp', $timestamp);
            $pst->bindParam(':action', $action);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();

            return $count;
        }
    };
?>