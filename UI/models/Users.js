/*global $*/

function Users() {
    this.models = [];
}

Users.prototype.createUser = function(user){
  
  var config = {
      url: 'https://web91-ciprianbiscovan.c9users.io/api/accounts/create',
      method: 'POST',
      dataType: 'JSON',
      data:{
          name: user.name,
          email:user.email,
          password: user.password,
          repassword: user.repassword,
          role: user.role
      },
      
      error: function(){
          
      }
  };  
    
};

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