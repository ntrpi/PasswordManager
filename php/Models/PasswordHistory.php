<?php
// File created by Barbara Cam 2021/04.
namespace Codesses\php\Models;

class PasswordHistory
{

    public function getAllPasswordHistory($dbconnection)
    {
        $sql = "SELECT ur.url as url, ph.action as action, ph.old_password as old_password, ph.new_password as new_password, ph.old_password_hint as old_password_hint, ph.new_password_hint as new_password_hint, ph.user_id as user_id
        FROM password_history ph inner join users us on us.user_id = ph.user_id inner join url ur on ur.url_id = ph.url_id ";
        $pdostm = $dbconnection->prepare($sql);
        $pdostm->execute();
        $phistories = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $phistories;
    } 
}


?>