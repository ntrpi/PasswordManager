<?php
namespace Codesses\php\Models
{
    use Codesses\php\Models\Model;
    require_once "Model.php";

    class FAQ extends Model
    {
        // There should be one item for every column in the database.
        public static array $columnNames = array( "faq_id", "question", "answer");

        public function __construct()
        {
            parent::__construct( "faq", "faq_id", self::$columnNames );
        }

        public function getNumFAQ()
        {
            return parent::getNumRows();
        }

        public function getFAQObjects()
        {
            return parent::getRowObjects();
        }

        public function getFAQObject( $id )
        {
            return parent::getRowObject( $id );
        }

        public function deleteFAQ( $id )
        {
            return parent::deleteRow( $id );
        }

        public function updateFAQ( $params ) // Expecting an object with key == column and value == value pairs.
        {
            return parent::updateRow( $params );
        }

        public function createFAQ( $params ) // Expecting an object with key == column and value == value pairs.
        {
            // This params object will likely be from the form processor, so make sure you add in values for the columns
            // that don't have input fields and unset value that don't correspond to a column.

            return parent::addRow( $params );
        }
    }
}
?>