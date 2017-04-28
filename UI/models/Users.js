/*global $*/

function Users() {
    this.models = [];
}
        //==========CREATE USER==========\\

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

        //==========UPDATEING USER==========\\
        
=======
    
     var uploadData = new FormData();
      uploadData.append("name", user.name);
      uploadData.append("email",user.email);
      uploadData.append("password", user.password);
      uploadData.append("repassword", user.repassword);
      uploadData.append("role", user.role);
      uploadData.append("job", user.job);
      uploadData.append("description",user.description);
      uploadData.append("avatar",user.picture);
  
  var config = {

      url: 'https://web91-didisuperapple.c9users.io/api/accounts/create',
      method: 'POST',
      dataType: 'JSON',
      data:uploadData,
      processData:false,
      contentType:false,
      error: function(response){
          
          console.log(response)
          console.log("Error while request create User!");
      }
  };  
   return $.ajax(config); 
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

Users.prototype.login = function(email,password){
    var config = {
        url: '/api/accounts/login',
        type:'POST',
        dataType: 'JSON',
        data:{
            email:email,
            pass:password
        },
        
        error: function(response){
            console.log("Oops!something went wrong while authenticating user!");
            console.log(response);
        },
        
    };
    
    return $.ajax(config); //send req. to server and return the result
};

