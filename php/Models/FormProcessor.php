<?php
namespace Codesses\php\Models
{
    class FormProcessor 
    {

        private function __construct()
        {        
        }

        // Function sanitizeInput adapted from 
        // https://www.w3schools.com/php/php_form_validation.asp 2021/02/08.
        public static function sanitizeInput( $input ) 
        { 
            return ( htmlspecialchars( stripslashes( trim( $input ) ) ) );
        }
        

        public static function isPost( $submitName )
        {
            return $_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST[ $submitName ] );
        }

        public static function getValuesObject( $inputNames ) // Expecting an array of input element names.
        {
            $values = new \stdClass();
            foreach( $inputNames as $name ) {   
                $inputValue = isset( $_POST[ $name ] ) ? $_POST[ $name ] : "";
                $inputValue = self::sanitizeInput( $inputValue );
                $values->$name = $inputValue;
            }
            return $values;
        }

        public static function getPostValue( $value )
        {
            return $_POST[ $value ];
        }
    }
}
?>