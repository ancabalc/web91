/*global$*/
/*global Provider*/
function Providers(){
    this.models=[];
}

    Providers.prototype.listTopProviders=function() {
   
        var that =this;
        var config={
            url:"https://web91-didisuperapple.c9users.io/api/users/list", // check for api path
            method: "GET",
            success: function(resp) {
                var providers = JSON.parse(resp);
                for (var i=0; i<providers.length; i++) {
                    var provider=new Provider(providers[i]);
                    that.models.push(provider);
            }
            
        },
            error: function() {
                console.log("Something went wrong while looking for our providers");
            }
    
        };
        
        return $.ajax(config);
        
    };