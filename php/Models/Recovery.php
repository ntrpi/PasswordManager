<?php
// File created by Barbara Cam 2021/04.
namespace Codesses\php\Models;

class Recovery 
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

    public function getQuestions($db)
    {
        $query = "SELECT * FROM security_questions";

        $pdostm = $db->prepare($query);
        $pdostm->execute();
        //fetch all result
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    

    public function getRecoveryByUser($db, $user)
    {
        $query = "SELECT sa.sa_id as id, sa.sq_id as sq_id, sa.user_id as user, us.user_name as uname, sq.question as question, sa.answer as answer FROM security_answers sa inner join security_questions sq on sq.sq_id = sa.sq_id inner join users us on sa.user_id = us.user_id AND sa.user_id = :user";
        
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':user', $user, \PDO::PARAM_STR);
        $pdostm->execute();
        $r = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $r;
    }

    public function getRecoveryById($id, $db)
    {
        $sql = "SELECT sa.sa_id as id, sa.user_id as user, us.user_name as uname, sa.sq_id as sq_id, sq.question as question, sa.answer as answer FROM security_answers sa inner join security_questions sq on sq.sq_id = sa.sq_id inner join users us on sa.user_id = us.user_id AND sa.sa_id = :id";
        
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();        
        $r = $pst->fetch(\PDO::FETCH_OBJ);
        return $r;
    }


    public function getAllRecoveries($dbconnection)
    {
        $sql = "SELECT sa.sa_id as id, us.user_name as uname, sq.question as question, sa.answer FROM security_answers sa inner join security_questions sq on sq.sq_id = sa.sq_id inner join users us on sa.user_id = us.user_id ";
        
        $pdostm = $dbconnection->prepare($sql);
        $pdostm->execute();
        $recoveries = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $recoveries;
    }   

    public function addRecovery($sq_id, $answer, $user, $db)
    {
        $sql = "INSERT INTO security_answers(sq_id, answer, user_id) values (:sq_id, :answer, :user)";

        $pst = $db->prepare($sql);        
        $pst->bindParam(':sq_id', $sq_id);
        $pst->bindParam(':answer', $answer);
        $pst->bindParam(':user', $user);
        $count = $pst->execute();
        return $count;
    }

    public function deleteRecovery($id, $db)
    {
        $sql = "DELETE FROM security_answers WHERE sa_id = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
    public function updateRecovery($id, $sq_id, $answer, $user, $db)
    {
        $sql = "UPDATE security_answers
                set user_id = :user,
                answer = :answer,
                sq_id = :sq_id            
                WHERE sa_id = :id";

        $pst =  $db->prepare($sql);
        $pst->bindParam(':sq_id', $sq_id);
        $pst->bindParam(':user', $user);
        $pst->bindParam(':answer', $answer);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }

}

?>