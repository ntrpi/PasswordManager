<?php
namespace Codesses\php\Models
{
    use Codesses\php\Models\Model;
    require_once "Model.php";

    class User extends Model
    {
        // There should be one item for every column in the database.
        public static array $columnNames = array( "user_id", "first_name", "last_name", "email", "login_password", "recovery_email", "phone", "is_admin" );

        // These correspond to the names of the input fields of your form.
        // They may or may not be the same as the associated columns in the database, but if they are not,
        // you will need to deal with that manually. See createUser( $params ) below.
        public static array $inputNames = array( "user_id", "first_name", "last_name", "email", "login_password", "password2" );

        // Error messages that correspond 1-to-1 with the input fields.
        public static array $errorMessages = array(
            "user_id" => "Please enter a valid user ID.",
            "first_name" => "Please enter a name that is a least two characters long and has only letters, hyphens, and apostrophes.",
            "last_name" => "Please enter a name that is a least two characters long and has only letters, hyphens, and apostrophes.",
            "user_name" => "Please enter a user name that is at least 8 characters long.",
            "email" => "Please enter a valid email address.",
            "login_password" => "Please enter a password that is at least 8 characters long and contains at least one upper case letter, one number, and one special character.",
            "password2" => "Please enter a matching password."
        );

        public function __construct()
        {
            parent::__construct( "users", "user_id", self::$columnNames );
        }

        // Syntactic sugar.
        public function getNumUsers()
        {
            return parent::getNumRows();
        }

        // Syntactic sugar.
        public function getUsers()
        {
            return parent::getRowObjects();
        }

        // Syntactic sugar.
        public function getUsersWhere( $columnName, $value )
        {
            return parent::getRowObjectsWithValue( $columnName, $value );
        }

        // Syntactic sugar.
        public function getUser( $id )
        {
            return parent::getRowObject( $id );
        }

        // Syntactic sugar.
        public function deleteUser( $id )
        {
            return parent::deleteRow( $id );
        }

        // Syntactic sugar. Note that if the properties of the $params object do not correspond to 
        // database columns, the update will fail.
        // $params: An object with properties that are key/value pairs corresponding to columns in the database.
        public function updateUser( $params ) 
        {
            return parent::updateRow( $params );
        }

        // Create a new user using the provided key/value pairs. Modify the $params object so that 
        // the object properties correspond to the column names in the database.
        // Note that if the properties of the $params object do not correspond to 
        // database columns, the user will not be added.
        public function createUser( $params )
        {
            // This params object will likely be from the form processor, so make sure you add in values for the columns
            // that don't have input fields and unset value that don't correspond to a column.

            unset( $params->password2 );    // password2 is used for validation, it doesn't exist in the database.

            return parent::addRow( $params );
        }

        // Make sure that the $params are appropriate for creating a new user.
        // $action: One of "create" or "update".
        public function fixParams( $params, $action )
        {
            if( $action == "create" ) {
                unset( $params->user_id );
                unset( $params->password2 );
                return $params;
            }
            if( $action == "update" ) {
                // Not sure yet.
            }
            return $params;
        }

        // Validate the value for the given column.
        public function isValid( $columnName, $value )
        {
            if( $columnName == "first_name" || $columnName == "last_name" ) {
                return FormProcessor::isValidName( $value );
            }
            if( $columnName == "login_password" ) {
                return FormProcessor::isValidPassword( $value, 8, true, true, true );
            }
            if( $columnName == "email" ) {
                return FormProcessor::isValidEmail( $value );
            }
            return false;
        }

        // Validate all of the key/value pairs in the $params object.
        // If everything is valid, return null. Otherwise, return the name of the 
        // invalid input.
        public function validateInput( $params )
        {
            foreach( $params as $key=>$value ) {
                if( !$this->isValid( $key, $value ) ) {
                    return $key;
                }
            }
            return null;
        }


    }
}
?>