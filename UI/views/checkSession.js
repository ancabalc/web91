
/*global $*/

$(document).ready(onHtmlLoaded);

function onHtmlLoaded(){
    var signUp = $("a[href='signup.html']");
    var signIn = $("a[href='login.html']");
    var signOut = $(".logoutBtn");
    var newAppl = $(".newApplication");
    var userProfile = $(".userProfile");
    var url = window.location.href;
    var urlComp = url.split("/");
    var page = urlComp[urlComp.length - 1];
   
    checkSession().done(function(response){
        
        if(response.isLogged === true){
            signUp.addClass("hide");
            signUp.removeClass("show");
            
            signIn.addClass("hide");
            signIn.removeClass("show");
            
            signOut.addClass("show");
            signOut.removeClass("hide");
            
            newAppl.addClass("show");
            newAppl.removeClass("hide");
            
            userProfile.addClass("show");
            userProfile.removeClass("hide");
            
            return true;
        }else{
            console.log(response.message);
            signUp.addClass("show");
            signUp.removeClass("hide");
            
            signIn.addClass("show");
            signIn.removeClass("hide");
            
            signOut.addClass("hide");
            signUp.removeClass("show");
            
            newAppl.addClass("hide");
            newAppl.removeClass("show");
            
            userProfile.addClass("hide");
            userProfile.removeClass("show");
            
            if(page.toLowerCase() === "user-profile.html" || page.toLowerCase() === "new-application.html" ){
                window.location.href = "/UI/pages/login.html";
            }
            return false;
        }
    });
}

function checkSession(){
   
    var config = {
         url: '/api/accounts/checkSession',
        type:'GET',
        dataType: 'JSON',
        rror: function(response){
            console.log("Oops!something went wrong while checking session!");
            console.log(response);
        },
        
    };

     return $.ajax(config); //send req. to server and return the result
}
