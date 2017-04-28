/*global $*/

$(document).ready(onHtmlLoaded);

function onHtmlLoaded(){
    var logout=$(".logoutBtn");
   
    logout.on("click",doLogout);
}

function doLogout(){
    
    var config = {
        url: "/api/accounts/logout",
        type: "POST",
        dataType: "JSON",
        
        error: function(){
            alert("Oops! LogOut didn`t work right now!");
        }
    };
    
    $.ajax(config).done(function(response){
        if (response.success === true){
            window.location.href = '/UI/pages/login.html';
        }else{
            alert("error while logging Out!");
        }
    });
    
}