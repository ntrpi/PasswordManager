<?php
// File created by Sandra Kupfer 2021/03.

namespace Codesses\php\Models
{
    class FormProcessor 
    {
        public const VALIDATION_NAME = 0;
        public const VALIDATION_USER_NAME = 1;
        public const VALIDATION_EMAIL = 2;
        public const VALIDATION_PHONE = 3;
        public const VALIDATION_PASSWORD = 4;

        public const VALIDATION_TYPES = array (
            self::VALIDATION_NAME,
            self::VALIDATION_USER_NAME,
            self::VALIDATION_EMAIL,
            self::VALIDATION_PHONE,
            self::VALIDATION_PASSWORD
        );

        // Static class.
        private function __construct()
        {        
        }

        // Function sanitizeInput adapted from 
        // https://www.w3schools.com/php/php_form_validation.asp 2021/02/08.
        public static function sanitizeInput( $input ) 
        { 
            return ( htmlspecialchars( stripslashes( trim( $input ) ) ) );
        }
        
        // Confirm that a form was submitted with POST and that the submit input had the given name.
        public static function isPost( $submitName )
        {
            return $_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST[ $submitName ] );
        }

        // Return an object with the input names as keys and the input field values as values.
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

        // Syntactic sugar.
        public static function getPostValue( $value )
        {
            return $_POST[ $value ];
        }

        // Names can only have letters, apostrophes, and hyphens.
        public static function isValidName( $name, $length = 2 )
        {
            $nameRegex = "/^[a-zA-Z-' ]*$/";
            return is_string( $name ) && preg_match( $nameRegex, $name ) && strlen( $name ) >= $length;
        }

        // Validating format only.
        public static function isValidEmail( $email )
        {
            return is_string( $email ) && filter_var( $email, FILTER_VALIDATE_EMAIL );
        }

        // Validating against 10 digits only.
        public static function isValidPhone( $phone )
        {
            return preg_match( "/\d{10}/", $phone );
        }

        // Validating is string and length.
        public static function isValidUserName( $name, $length = 5 )
        {
            return is_string( $name ) && strlen( $name ) >= $length;
        }

        // Use the paramaters to make the conditions less strict.
        public static function isValidPassword( $password, $length = 8, $mustContainUpper = true, $mustContainNumber = true, $mustContainSpecial = true )
        {
            return strlen( $password ) >= $length
            && ( $mustContainUpper && preg_match( "/.*[A-Z].*/", $password ) )
            && ( $mustContainNumber && preg_match( "/.*[0-9].*/", $password ) )
            && ( $mustContainSpecial && preg_match( "/.*[^a-zA-Z0-9].*/", $password ) );
        }

        // Syntactic sugar.
        public static function isValid( $value, $type )
        {
            switch( $type ) {
                case Self::VALIDATION_NAME: return Self::isValidName( $value );
                case Self::VALIDATION_USER_NAME: return Self::isValidUserName( $value );
                case Self::VALIDATION_EMAIL: return Self::isValidEmail( $value );
                case Self::VALIDATION_PHONE: return Self::isValidPhone( $value );
                case Self::VALIDATION_PASSWORD: return Self::isValidPassword( $value );
            }
        }
 
        public static function isValidationType( $type )
        {
            return array_key_exists( self::VALIDATION_TYPES, $type );
        }
    }

    // Shorthand.
    class FP extends FormProcessor {}
}
?>