<?php

namespace Codesses\php\Models
{
    use Codesses\php\Models\Database;
    require_once "Database.php";

    // This class standardizes how Models interact with the database. 
    class Model 
    {
        // The name of the database table.
        protected $tableName;

        // The name of the primary key.
        protected $idName;

        // An array of all the column names, including the primary key.
        protected array $columns;

        // The sql to get the number of rows in the table.
        protected $countSql;

        // The sql to get everything from the table.
        protected $listSql;

        // The sql to get a row from the table with the given primary key.
        protected $findSql;

        // The sql to delete a row from the table with the given primary key.
        protected $deleteSql;

        // This will be the name if the submit input for the create form for this table.
        // Use getSubmitAdd() to get this name.
        public $submitAdd;

        // This will be the name if the submit input for the edit form for this table.
        // Use getSubmitEdit() to get this name.
        public $submitEdit;

        // This will be the name if the submit input for the delete form for this table.
        // Use getSubmitDelete() to get this name.
        public $submitDelete;

        // This is protected because this class can't be instantiated, only extended.
        // $tableName: The name of the database table.
        // $idName: The name of the primary key.
        // $columns: An array of all the column names, including the primary key.
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

        // Given an array of column names to use as keys and an associated array to use as values,
        // return an object with the key/value pairs as properties.
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

        // Return the array of column names for this table.
        public function getColumns()
        {
            return $this->columns;
        }

        // Return the name of the submit input field for the create form.
        public function getSubmitAdd()
        {
            return $this->submitAdd;
        }

        // Return the name of the submit input field for the edit form.
        public function getSubmitEdit()
        {
            return $this->submitEdit;
        }

        // Return the name of the submit input field for the delete form.
        public function getSubmitDelete()
        {
            return $this->submitDelete;
        }

        // Return the number of rows for this table in the database.
        protected function getNumRows()
        {
            return Database::getDbResult( $this->countSql );
        }

        // Return an array of objects, where each object is a row in the database,
        // and the columns and values are its properties.
        protected function getRowObjects()
        {
            return Database::getDbResult( $this->listSql );
        }

        // Return an object with the primary key and passed in $id are the only property.
        protected function getIdParamsObject( $id )
        {
            $params = new \stdClass();
            $name = $this->idName;
            $params->$name = $id;
            return $params;
        }

        // Return an object that has the columns and values of the row in the database with the given primary key
        // as its properties.
        protected function getRowObject( $id )
        {
            $results = Database::getDbResultWithParams( $this->findSql, $this->getIdParamsObject( $id ) );
            return $results[0];
        }

        // Delete the row in the database with the given primary key.
        protected function deleteRow( $id )
        {
            return Database::getDbResultWithParams( $this->deleteSql, $this->getIdParamsObject( $id ) );
        }

        // Update the row in the database with the passed in parameters. One of the
        // properties of $params should be the primary key and value.
        // $params: An object with key == column and value == value pairs.
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

        // Add a new row in the database with the passed in parameters.
        // $params: An object with key == column and value == value pairs.
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