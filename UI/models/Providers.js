/*global*/

function Providers(){
    this.models=[];
}

    Providers.prototype.listTopProviders=function() {
   
        var that =this;
        var config={
            url:"https://web91-didisuperapple.c9users.io/users/list.php", // check for api path
            method: "GET",
            success: function(resp) {
                for (var i=0; i<resp.length; i++) {
                    var provider=new Provider(resp[i]);
                    that.models.push(provider);
            }
            
        },
            error: function() {
                console.log("Something went wrong while looking for our providers");
            }
    
        };
        
        return $.ajax(config);
        
    };