<?php
namespace Codesses\php\Models
{
    use Codesses\php\Models\Model;
    require_once "Model.php";

    class User extends Model
    {
        // There should be one item for every column in the database.
        public static array $columnNames = array( "user_id", "first_name", "last_name", "user_name", "email", "login_password", "recovery_email", "phone", "is_admin" );

        // These correspond to the names of the input fields of your form.
        // They may or may not be the same as the associated columns in the database, but if they are not,
        // you will need to deal with that manually. See createUser( $params ) below.
        public static array $inputNames = array( "user_id", "first_name", "last_name", "user_name", "email", "login_password", "password2" );

        // Error messages that correspond 1-to-1 with the input fields.
        public static array $errorMessages = array(
            "user_id" => "Please enter a valid user ID.",
            "first_name" => "Please enter a name that is a least two characters long and has only letters, hyphens, and apostrophes.",
            "last_name" => "Please enter a name that is a least two characters long and has only letters, hyphens, and apostrophes.",
            "user_name" => "That user name is already in use. Please enter a different user name.",
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
            // that don't have input fields and unset value that don't correspond to a column, 
            // or call fixParams( $params, "create" ) first.

            return parent::addRow( $params );
        }

        // Make sure that the $params are appropriate for creating a new user.
        // $action: One of "create" or "update".
        public function fixParams( $params, $action )
        {
            if( $action == "create" ) {
                unset( $params->user_id );
            }

            // Hash the password no matter what.
            if( isset( $params->login_password ) ) {
                $params->login_password = password_hash( $params->login_password, PASSWORD_DEFAULT );
            }

            // Get rid of the repeat password.
            unset( $params->password2 );

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
            if( $columnName == "user_name" ) {
                // Check that the user name is unique.
                return strlen( $value ) > 0 && sizeof( $this->getUsersWhere( $columnName, $value ) ) == 0;
            }
            return false;
        }

        // Validate all of the key/value pairs in the $params object.
        // If everything is valid, return null. Otherwise, return the name of the 
        // invalid input.
        public function validateInput( $params, $action )
        {
            foreach( self::$inputNames as $key ) {
                if( $key == $this->idName && $action == "create" ) {
                    continue;
                }
                if( $key == "password2" ) {
                    if( strcmp( $params->login_password, $params->$key ) != 0 ) {
                        return $key;
                    }
                    continue;
                }
                if( !$this->isValid( $key, $params->$key ) ) {
                    return $key;
                }
            }
            return null;
        }

        public function getTableHeadersRow( $getActions)
        {
            echo '
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>';
            if( $getActions ) {
                echo '
                <th scope="col"></th>
                <th scope="col"></th>';
            }

            echo '
            </tr>
            ';
        }

        public function getRowForUser( $user, $getActions )
        {
            $edit = $this->submitEdit;
            $delete = $this->submitDelete;
            $user_id = $user->user_id;
            $rows = "
            <tr>
                <th>{$user_id}</th>
                <td>{$user->first_name} {$user->last_name}</td>
                <td>{$user->user_name}</td>
                <td>{$user->email}</td>";

            if( $getActions ) {
                $rows .= "            
            <td>
                <form action=\"./account.php?action=update&user_id={$user_id}\" method=\"POST\">
                    <div class=\"inputDiv\">
                        <input type=\"hidden\" id=\"user_id\" name=\"user_id\" value=\"{$user_id}\">
                        <input type=\"submit\" value=\"Edit\" name=\"{$edit}\">
                    </div>
                </form>
            </td>
            <td class=\"formTd\">
                <form action=\"./account.php?action=delete&user_id={$user_id}\" method=\"POST\">
                    <div class=\"inputDiv\">
                        <input type=\"hidden\" id=\"user_id\" name=\"user_id\" value=\"{$user_id}\">
                        <input type=\"submit\" value=\"Delete\" name=\"{$delete}\">
                    </div>
                </form>
            </td>";
            }

            $rows .= "
            </tr>";
            echo $rows;
        }

        public function getRowForUserId( $user_id, $getActions )
        {
            $user = $this->getUser( $user_id );
            return $this->getRowForUser( $user, $getActions );
        }

        public function getRowsForUsers()
        {
            $rows = "";
            $users = $this->getUsers();
            foreach( $users as $user ) {
                $rows .= $this->getRowForUser( $user, true );
            }
        }

    }
}
?>