<?php
namespace Codesses\php\Models;
class FAQ {
    public function addFAQ($question, $answer, $db){

        $sql = "INSERT INTO faq (question, answer)
            VALUES (:question, :answer)";
        $pst = $db->prepare($sql);
    
        $pst->bindParam(':question', $question);
        $pst->bindParam(':answer', $answer);
    
        $count = $pst->execute();
        return $count;
        }
}