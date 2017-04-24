/*global $*/

function Users() {
    this.models = [];
}
        //==========UPDATEING USER==========\\

Users.prototype.updateUser = function(name,description,image) {
        
        var ajaxOptions = {
            url:"https://web91-andrei.c9users.io/api/users/update",
            type:"POST",
            dataType:"json",
            data:{
                name:name,
                description:description,
                image:image,
            },
            success:function(resp){
                // this.models.push(resp)
                window.updateResp = resp;
                window.currentUser = resp;
                console.log("Your profile is updated!");
            },
            error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            },
            complete:function(){
                console.log("AJAX Request has completed");
            }
        };
        return $.ajax(ajaxOptions);
};