<?php
namespace Codesses\php\Models
{
    use Codesses\php\Models\Model;
    require_once "./php/Models/Model.php";

    class User extends Model
    {
        public static array $columnNames = array( "user_id", "first_name", "last_name", "email", "login_password", "recovery_email", "phone", "is_admin" );

        public function __construct()
        {
            parent::__construct( "users", "user_id", self::$columnNames );
        }

        public function getNumUsers()
        {
            return parent::getNumRows();
        }

        public function getUserObjects()
        {
            return parent::getRowObjects();
        }

        public function getUserObject( $id )
        {
            return parent::getRowObject( $id );
        }

        public function deleteUser( $id )
        {
            return parent::deleteRow( $id );
        }

        public function updateUser( $params ) // Expecting an object with key == column and value == value pairs.
        {
            return parent::updateRow( $params );
        }

        public function createUser( $params ) // Expecting an object with key == column and value == value pairs.
        {
            return parent::addRow( $params );
        }
        

    }
}
?>