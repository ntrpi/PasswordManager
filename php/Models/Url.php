<?php
namespace Codesses\php\Models
// File created by Sandra Kupfer 2021/03.
{
    use Codesses\php\Models\Model;
    require_once "Model.php";

    class Url extends Model
    {
        // There should be one item for every column in the database.
        public static array $columnNames = array( "url_id", "url", "password", "user_name", "user_id", "password_hint" );

        // These correspond to the names of the input fields of your form.
        // They may or may not be the same as the associated columns in the database, but if they are not,
        // you will need to deal with that manually. See createUser( $params ) below.
        public static array $inputNames = array( "url_id", "url", "user_name", "password", "password_hint" );

        public function __construct()
        {
            parent::__construct( "url", "url_id", self::$columnNames );
        }

        // Syntactic sugar.
        public function getNumUrls()
        {
            return parent::getNumRows();
        }

        // Syntactic sugar.
        public function getAllUrls()
        {
            return parent::getRowObjects();
        }

        // Syntactic sugar.
        public function getUrlsWhere( $columnName, $value )
        {
            return parent::getRowObjectsWithValue( $columnName, $value );
        }

        // Syntactic sugar.
        // $id: the unique primary key of the url.
        public function getUrl( $id )
        {
            return parent::getRowObject( $id );
        }

        // Syntactic sugar.
        // $id: the unique primary key of the url.
        public function deleteUrl( $id )
        {
            return parent::deleteRow( $id );
        }

        public function createUrl( $params )
        {
            return parent::addRow( $params );
        }

    }
}
?>