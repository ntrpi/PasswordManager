<?php

namespace Codesses\php\Models {

    class Password
    {

        public function getPassword($db)
        {
            $sql = "SELECT * FROM url";

            $pdostm = $db->prepare($sql);
            $pdostm->execute();

            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }
        public function getAllPasswords($db)
        {
            $sql = "SELECT url.url, url.password, users.user_id, users.user_name, url.url_id FROM users, url where users.user_id = url.user_id  ";
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
            $passwords = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $passwords;
        }
        public function addPassword($user_id, $url, $password, $db)
        {
            $sql = "INSERT INTO url(user_id, url, password) values (:user, :url, :password)";

            $pst = $db->prepare($sql);
            $pst->bindParam(':user', $user_id);
            $pst->bindParam(':url', $url);
            $pst->bindParam(':password', $password);
            $count = $pst->execute();
            return $count;
        }
        public function deletePassword($id, $db)
        {
            $sql = "DELETE FROM url WHERE url_id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();
            return $count;
        }
    }
}
