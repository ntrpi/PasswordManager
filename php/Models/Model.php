<?php

namespace Codesses\php\Models
{
    use Codesses\php\Models\Database;
    require_once "Database.php";

    class Model 
    {
        protected $tableName;
        protected $idName;
        protected array $columns;

        protected $countSql;
        protected $listSql;
        protected $findSql;
        protected $deleteSql;

        public $submitAdd;
        public $submitEdit;
        public $submitDelete;

        protected function __construct( $tableName, $idName, array $columns )
        {
            $this->tableName = $tableName;
            $this->idName = $idName;
            $this->columns = $columns;

            $this->countSql = "SELECT COUNT(*) FROM " . $tableName;
            $this->listSql = "SELECT * FROM " . $tableName;
            $this->findSql = "SELECT * FROM " . $tableName . " WHERE " . $idName . " = :" . $idName;
            $this->deleteSql = "DELETE FROM " . $tableName . " WHERE " . $idName . " = :" . $idName;

            $this->submitAdd = "add" . $tableName;
            $this->submitEdit = "edit" . $tableName;
            $this->submitDelete = "delete" . $tableName;
        }

        public static function getParams( array $columnNames, array $values )
        {
            $params = new \stdClass();
            $numItems = sizeof( $columnNames );
            for( $i = 0; $i < $numItems; $i++ ) {
                $columnName = $columnNames[$i];
                $params->$columnName = $values[$i];
            }
            return $params;
        }

        public function getColumns()
        {
            return $this->columns;
        }

        public function getSubmitAdd()
        {
            return $this->submitAdd;
        }

        public function getSubmitEdit()
        {
            return $this->submitEdit;
        }

        public function getSubmitDelete()
        {
            return $this->submitDelete;
        }

        protected function getNumRows()
        {
            return Database::getDbResult( $this->countSql );
        }

        protected function getRowObjects()
        {
            return Database::getDbResult( $this->listSql );
        }

        protected function getIdParamsObject( $id )
        {
            $params = new \stdClass();
            $name = $this->idName;
            $params->$name = $id;
            return $params;
        }

        protected function getRowObject( $id )
        {
            $results = Database::getDbResultWithParams( $this->findSql, $this->getIdParamsObject( $id ) );
            return $results[0];
        }

        protected function deleteRow( $id )
        {
            return Database::getDbResultWithParams( $this->deleteSql, $this->getIdParamsObject( $id ) );
        }

        // Expecting an object with key == column and value == value pairs.
        protected function updateRow( $params )
        {
            // Set up the sql.
            $sql = "UPDATE " . $this->tableName . " SET ";
            foreach( $params as $key=>$value ) {
                if( $key == $this->idName ) {
                    continue;
                }
                $sql .= "{$key} = :{$key}, ";
            }
            
            // Strip trailing comma.
            $sql = substr( $sql, 0, strlen( $sql ) - 2 );

            // Finish sql.
            $sql .= " WHERE " . $this->idName . " = :" . $this->idName . ";";

            return Database::getDbResultWithParams( $sql, $params );
        }

        protected function addRow( $params )
        {
            $idName = $this->idName;
            unset( $params->$idName );

            // Set up the sql.
            $sql = "INSERT INTO " . $this->tableName . " (";
            $values = " ) VALUES ( ";
            foreach( $params as $key=>$value ) {
                if( $key == $this->idName ) {
                    continue;
                }
                $sql .= "{$key}, ";
                $values .= ":{$key}, ";
            }

            // Strip trailing comma.
            $sql = substr( $sql, 0, strlen( $sql ) - 2 );
            $values = substr( $values, 0, strlen( $values ) - 2 );

            // Finish sql.
            $sql .= $values . " );";

            return Database::getDbResultWithParams( $sql, $params );
        }
    }
}

?>