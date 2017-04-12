/*global $*/

$(document).ready(onHtmlLoaded);

//global variables
 var nameText = undefined;
 var emailText = undefined;
 var passwordText = undefined;
 var repasswordText = undefined;
 var roleText = undefined;

function onHtmlLoaded(){
    
    var submitButton = $("button[type='submit']");

    submitButton.on('click',submit);
    
    
    
}//END onHtmlLoaded function

function submit(){
    
    //get user inputs
    nameText = $("input[name='name']").val();
    emailText = $("input[name='email']").val();
    passwordText = $("input[name='password']").val();
    repasswordText = $("input[name='repassword']").val();
    roleText = $("input[type='radio']:checked").val();
    
     if(checkUserInputs()){
         
         console.log('Sending data to the server')
     }
}

function checkUserInputs(){
    
    var allClear = true;
    var errorName = $('#error-name');
    var errorEmail = $('#error-email');
    var errorPassword = $('#error-password');
    var errorRepassword = $('#error-repassword');
    var errorRole = $('#error-role');
  
    if(nameText === undefined || emailText === undefined || passwordText === undefined || repasswordText === undefined){
        alert("Internal error.Cannot get all inputs!!!");
        return false;
    }
    
    if(nameText.trim().length === 0){
        errorName.html("*Name cannot be empty");
        allClear = false;
    }else{
        errorName.html("*");
    }
    
    if(emailText.trim().length === 0){
        errorEmail.html("*Email cannot be empty");
        allClear = false;
    }else if(!isValidEmail(emailText)){
        errorEmail.html("*Email is not a valid email address");
        allClear = false;
    }else{
        errorEmail.html("*");
    }
    if(passwordText.trim().length === 0){
        errorPassword.html("*Password cannot be empty");
        allClear = false;
    }else if(passwordText.length < 6){
           errorPassword.html("* Password too short (minimum 6 characters)");
           allClear = false;
    }else{
          errorPassword.html("*"); 
    }
     if(repasswordText.trim().length === 0){
        errorRepassword.html("*Type your password again");
        allClear = false;
    }else if(passwordText !== repasswordText){
        errorRepassword.html("*Passwords don`t match");
        allClear = false;
    }else{
        errorRepassword.html("*");
    }
    if(roleText === undefined || roleText.trim().length === 0 || (roleText !== 'provider' && roleText !== 'client')){
        errorRole.html("*You didn`t choose role");
        allClear = false;
    }else{
        errorRole.html('*');
    }
  
    return allClear;
}

  //Validate user email
        function isValidEmail(email){
            
            const regEx =/^[a-z]{1}(?!.*(\.\.|\.@))[a-z0-9!#$%&*+/=?_{|}~.-]{0,63}@(?=.{0,253}$)([a-z0-9]\.|[a-z0-9][a-z0-9-]{0,63}[a-z0-9]\.)+[a-z0-9]{1,63}$/gmi;
            return email.match(regEx);
            
        }//END isValidEmail function