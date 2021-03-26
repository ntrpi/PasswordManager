<?php

namespace Codesses\php\Models
{

use PDOException;

    class Database {

        private static $dbName = "skdssite_Codesses";
        private static $host = "158.69.17.240:3306";
        private static $userName = "skdssite_test";
        private static $password = "tU8U4jB3Cz7yVRK";
        private static $dataSourceName;
        private static $dataPdo;
    
        private function __construct()
        {        
        }
        
        private static function getPdo()
        {
            if( self::$dataPdo == null ) {
                self::$dataSourceName  = "mysql:host=" .self::$host . ";dbname=" . self::$dbName;
    
                try {
                // Establish the connection.
                self::$dataPdo = new \PDO( self::$dataSourceName, self::$userName, self::$password );
        
                } catch( PDOException $e ) {
                    echo $e->getMessage()();
                    exit();
                }

                // Set some connection attributes.
                self::$dataPdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
            }
            return self::$dataPdo;
        }
    
        public static function prettyPrintObj( $obj )
        {
            $jsonData = json_encode( $obj, JSON_PRETTY_PRINT );
            echo "<pre> {$jsonData} </pre>";
        }
    
        public static function runSql( $sql )
        {
            // echo $sql;
            $dataPdo = self::getPdo();
            $pdoStatement = $dataPdo->prepare( $sql );
            $pdoStatement->execute();
            // $pdoStatement->debugDumpParams();
    
            return $pdoStatement;
        }
    
        public static function runSqlWithParams( $sql, $params )
        {
            // echo $sql;
            // var_dump( $params );

            $dataPdo = self::getPdo();
            $pdoStatement = $dataPdo->prepare( $sql );
    
            foreach( $params as $key=>$value ) {
                $pdoStatement->bindParam( ':' . $key, $params->$key );
            }
    
            $pdoStatement->execute();
            // $pdoStatement->debugDumpParams();
    
            return $pdoStatement;
        }

        public static function getRows( $pdoResult )
        {
            $rows = $pdoResult->fetchAll( \PDO::FETCH_OBJ );
            $pdoResult->closeCursor();
            return $rows;
        }

        public static function getDbResult( $sql )
        {
            $pdoResult = self::runSql( $sql );
            return self::getRows( $pdoResult );
        }

        public static function getDbResultWithParams( $sql, $params )
        {
            $pdoResult = self::runSqlWithParams( $sql, $params );
            return self::getRows( $pdoResult );
        }


        public function __destruct() {
            $this->datapdo->close();
        }
        
        
    }
}


?>