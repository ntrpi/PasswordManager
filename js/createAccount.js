window.onload = function () {

    const createAccountForm = document.forms.createAccountForm;
    const formFieldNames = [ "first_name", "last_name", "user_name", "email", "login_password", "password2" ];
    const formFields = {};

    const errorDivs = {};
    for( let i = 0; i < formFieldNames.length; i++ ) {
        const fieldName = formFieldNames[i];
        const divName = fieldName + "Error";
        errorDivs[ fieldName ] = document.getElementById( divName );
    }

    let formFieldBorder = "2px inset #EBE9ED"; 
    for( let i = 0; i < formFieldNames.length; i++ ) {
        const fieldName = formFieldNames[i];
        const formField = document.getElementById( fieldName );
        formField.onclick = function() {
            formField.style.border = formFieldBorder;
            const errorDiv = errorDivs[fieldName];
            errorDiv.style.display = "none";
        }
        formFields[ fieldName ] = formField;
    }

    const errorMessages = {
        "firstName": "Please enter a first name at least 2 characters long.",
        "lastName": "Please enter a last name at least 2 characters long.",
        "userName": "Please enter a user name at least 8 characters long.",
        "email": "Please enter a valid email address.",
        "password1": "Please enter a password at least 8 characters long.",
        "password2": "Please enter the same password twice."
    };

    const stringV = v8n().string();
    const length1V = v8n().greaterThan(1);
    const length7V = v8n().greaterThan(7);

    const validate = {
        "firstName": function( value ) {
            return stringV.test( value ) && length1V.test( value.length );
        },
        "userName": function( value ) {
            return stringV.test( value ) && length7V.test( value.length );
        },
        "email": function( value ) {
            return  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test( value );
        },
        "password1": function( value ) {
            return stringV.test( value ) && length7V.test( value.length );
        },
        "password2": function( value1, value2 ) {
            return value1 === value2;
        }
    };


    createAccountForm.addEventListener( "submit", function ( event ) {

        let password1 = "";
        for( let i = 0; i < formFieldNames.length; i++ ) {
            const fieldName = formFieldNames[i];
            const value = formFields[fieldName].value;
            if( fieldName === "password1" ) {
                password1 = value;
            }

            let isValid = false;
            if( fieldName === "password2" ) {
                isValid = validate[fieldName]( password1, value );
            } else if( fieldName === "lastName" ) {
                isValid = validate["firstName"]( value );
            } else {
                isValid = validate[fieldName]( value );
            }

            if( !isValid ) {
                formFields[fieldName].style.border = "4px solid var( --orange )";
                let errorDiv = errorDivs[fieldName];
                errorDiv.innerHTML = errorMessages[fieldName];
                errorDiv.style.display = "block";
                event.preventDefault();

                return false;
            }
        }
        
        createAccountForm.submit();
        return true;
    } );
};