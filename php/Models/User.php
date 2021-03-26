<?php
namespace Codesses\php\Models
{
    use Codesses\php\Models\Model;
    require_once "./Models/Model.php";

    class User extends Model
    {
        // There should be one item for every column in the database.
        public static array $columnNames = array( "user_id", "first_name", "last_name", "email", "login_password", "recovery_email", "phone", "is_admin" );

        // These correspond to the names of the input fields of your form.
        public static array $inputNames = array( "user_id", "first_name", "last_name", "email", "login_password", "password2" );

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
            // This params object will likely be from the form processor, so make sure you add in values for the columns
            // that don't have input fields and unset value that don't correspond to a column.

            unset( $params->password2 );    // password2 is used for validation, it doesn't exist in the database.

            return parent::addRow( $params );
        }
    }
}
?>