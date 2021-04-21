
window.onload = function(){
            
    var formhandle = document.forms.theformname;
    if( formhandle ) {

        var mail = document.getElementsByClassName("validation_mail");
        var password = document.getElementsByClassName("validation_password");
        var drop = document.getElementsByClassName("validation_drop");
        var radio = document.forms[0].rad;
        var checkbox = document.forms[0].check;
        
        formhandle.onsubmit = processform;
        
            function processform() {
                if (mail.value === ""|| mail.value === null ) {	
                    mail.style.background="red";
                    mail.focus();
                    return false;
                };
        
                if (password.value === ""|| password.value === null ) {	
                    password.style.background="red";
                    password.focus();
                    return false;
                };
                if (drop.value == 0){
                    drop.style.background="red";
                    return false;
                }
            return false;
        }
    }


}
