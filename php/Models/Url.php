<?php
namespace Codesses\php\Models
{
    use Codesses\php\Models\Model;
    require_once "./Models/Model.php";

    class Url extends Model {

        public static array $columnNames = array( "url_id", "url", "user_id", "user_name", "password", "password_hint" );

        public function __construct()
        {
            parent::__construct( "url", "url_id", self::$columnNames );
        }

        public function getNumUrls()
        {
            return parent::getNumRows();
        }

        public function getUrlObjects()
        {
            return parent::getRowObjects();
        }

        public function getUrlObject( $id )
        {
            return parent::getRowObject( $id );
        }

        public function deleteUrl( $id )
        {
            return parent::deleteRow( $id );
        }

        public function updateUrl( $params ) // Expecting an object with key == column and value == value pairs.
        {
            return parent::updateRow( $params );
        }

        public function createUrl( $params ) // Expecting an object with key == column and value == value pairs.
        {
            return parent::addRow( $params );
        }  
    }

    $urlObject = new Url;
    //public static array $columnNames = array( "url_id", "url", "user_id", "user_name", "password", "password_hint" );
    $values = array( "0", "facebook.com", "1", "sandra", "password", "default password" );
    $params = Model::getParams( Url::$columnNames, $valuse );
    $urlObject->createUrl( $params );

    $params->password = "newPassword";

    $params->url_id = "1";
    $urlObject->updateUrl( $params );
}
?>