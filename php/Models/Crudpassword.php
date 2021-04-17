<?php

namespace Codesses\php\Models
{

    Class Password {

        public function getPassword($db){
            $sql = "SELECT * FROM url";
    
            $pdostm = $db->prepare($sql);
            $pdostm->execute();

            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }
        public function getAllPasswords($db)
        {
            $sql = "SELECT url.url, url.password, users.user_id, url.url_id FROM users, url where users.user_id = url.user_id  ";
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
            $passwords = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $passwords;
        } 
    }
    
}
