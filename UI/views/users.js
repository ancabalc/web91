/*global $*/
/*global Users*/
        //==========UPDATEING USER==========\\

$(window).ready(function(){
    var users = new Users();
    var id = 1;
    var userDef = users.getUserProfile(id);
    userDef.done(populateUser);
    var image = null;
    
    function populateUser(){
        var userModel = users.model;
        $(".profile").append("<h2>"+userModel.name+"'s Profile</h2>");
        $("[name='name']").val(userModel.name);
        $("[job='job']").val(userModel.job);
        $("[description='description']").val(userModel.description);
        $("[role='role']").val(userModel.role);
        image = userModel.image;
        $(".img-responsive").attr("src", '/uploads/' + userModel.image);
        
    }
    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.img-responsive').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function(){
    readURL(this);
});
    
    $("[type='submit']").on("click",function(ev){
        ev.preventDefault();
 
        var formData = new FormData();
        var nameValue = $("[name='name']").val();
        var jobValue = $("[job='job']").val();
        var descriptionValue = $("[description='description']").val();
        var fileInput = $("[image='image']")[0];
        
        formData.append("name",nameValue);
        formData.append("job",jobValue);
        formData.append("description", descriptionValue);
        formData.append("id",id);
        
        if(fileInput.files[0]) {
            formData.append("image", fileInput.files[0]);
        } else {
            formData.append("image", image);
        }
        
        $.ajax({
            url:"https://web91-andrei.c9users.io/uploads?id="+id,
            type:"POST",
            data:formData,
            processData:false,
            contentType:false,
            success:function(resp){
                window.location.href = "https://web91-andrei.c9users.io/UI/pages/user-profile.html";
            },
            error:function(){
                console.log("Oops! Update profile failed");
            }
        });
        
    });
});