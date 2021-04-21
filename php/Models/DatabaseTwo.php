<?php
//File created by Wafa, Amanda, Elle, Barbara 03/2021
namespace PasswordManager\php\Models
{

use PDOException;

    class DatabaseTwo {

        // These variables must be set to the specific database connection information.
        private static $dbName = "skdssite_Codesses";
        private static $host = "158.69.17.240:3306";
        private static $userName = "skdssite_test";
        private static $password = "tU8U4jB3Cz7yVRK";

        // Private variables to interact with the database.
        private static $dataSourceName;
        private static $dbconnection;
    
        // Static class.
        private function __construct()
        {        
        }
        
        // Construct the PDO if required, then return PDO.
        public static function getDb()
        {
            if( self::$dbconnection == null ) {
                self::$dataSourceName  = "mysql:host=" .self::$host . ";dbname=" . self::$dbName;
    
                try {
                // Establish the connection.
                self::$dbconnection = new \PDO( self::$dataSourceName, self::$userName, self::$password );

                // Set some connection attributes.
                self::$dbconnection->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );

                } catch( PDOException $e ) {
                    echo $e->getMessage()();
                    exit();
                }

            }
            return self::$dbconnection;
        }
    }

}