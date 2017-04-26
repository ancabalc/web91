<?php
    require_once "models/UsersModel.php";
    
    class Accounts {
        
        private $userModel;
        
        function __construct(){
            $this->userModel = new UsersModel();
        }
        
        //FIELDS: name, email, password, repassword, role,job,descriptin,avatar
        function createAccount(){
            
            //Check if all required fields are received
            if(isset($_POST['name'],$_POST['email'],$_POST['password'],$_POST['repassword'],$_POST['role'],$_POST['description'],$_POST['job'],$_FILES['avatar']) && 
            !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword']) && !empty($_POST['role'])
            && !empty($_POST['description']) && !empty($_POST['job']) ){
            
              //Validate user email address
              if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                   return array("success"=>false,"message"=>"Email address is not valid!");
               }
               
               //check password length
               if(strlen($_POST['password']) < 6 ){
                   return array("success"=>false,"message"=>"Password too short!");
               }
               
               //check if password and repassword are the same
               if($_POST['password'] !== $_POST['repassword']){
                   return array("success"=>false,"message"=>"Passwords don`t match!");
               }
               
               //TO DO
               //add check for user email in database
               
               //check if role is valid 
               if(strtolower($_POST['role']) !== "provider" && strtolower($_POST['role']) !== "client"){
                   return array("success"=>false,"message"=>"Role not valid!");
               }
               
                $_POST['image_name'] = '';
                
                // save uploaded image file
                    
                    $file = $_FILES['avatar'];
                    
                    //check if file is indeed an image
                    if(isset($file['type']) && preg_match('/^image\/.*/mi',$file['type'])){
                        $fileName = pathinfo($file["name"])['filename'];
                        $fileExtension = pathinfo($file["name"])['extension'];
                        $newFileName = $fileName . strtotime('now') . "." . $fileExtension;
                        $_POST['image_name'] = $newFileName;
                    }
                    else{
                         return array("success"=>false,"message"=>"Only pictures are allowed!");
                    }
               
               //Encrypt password before storing it to DB
               //Replace user`s un-encrypted password with encrypted password
               $cryptPassword = crypt($_POST['password'],PASS_SALT);
               $_POST['password'] = $cryptPassword;
               
               //save user data to DB
               $dbResult = $this->userModel->insertUser($_POST);
               
               //return result after DB query success/fail
               if($dbResult['errorCode'] == null){
                   move_uploaded_file($file["tmp_name"], "avatars/" . $newFileName);
                   return array("success"=>true,"message"=>"Account created succesfully!");
               }else{
                    return array("success"=>false,"message"=>"Account creation failed. REASON: " . $dbResult['errorMsg']);
               }
          
            }else{
                
                //returned in case the not all fields are recieved
                return array("success"=>false,"message"=>"All fields are required!");
            }
        }//END createAccount method
        
        
        function login() {
           
            if (!empty($_POST["email"]) && !empty($_POST["pass"])) 
            {
                $pass = crypt($_POST["pass"], PASS_SALT);
                
                //changed usersModel to userModel 
                $user = $this->userModel->checkUser($_POST["email"], $pass);
              
                if (is_array($user)) 
                {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["isLogged"] = TRUE;
                    $_SESSION["name"] = $user["name"];// This fileds don`t exist in this database ---> $user["first_name"] . " " . $user["last_name"];
                    return array("isLogged"=>$_SESSION["isLogged"],
                    "user_id"=>$_SESSION["user_id"]);
                } else 
                {
                    return array("error"=>"Invalid credentials.");
                }
            } else
            {
                return array("error"=>"Empty credentials.");    
            }
        }
        
        function checkSession(){
            if(!isset($_SESSION["isLogged"]) || (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === false )){
                return array('isLogged'=>false,"message"=>"Nobody logged in!");
            }else{
                if($_SESSION["isLogged"] === true){
                    return array('isLogged'=>true,"message"=>"Logged In","id"=>$_SESSION["user_id"]);
                }else{
                     return array('isLogged'=>false,"message"=>"Somebody could be logged!");
                }
            }
        }
        
        function logout(){
            if(isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === true ){
                unset($_SESSION['isLogged']);
                unset($_SESSION['user_id']);
                unset($_SESSION['name']);
                session_destroy();
                 return array("success"=>true,"message"=>"Logout successfull!");
            }else{
                return array("success"=>false,"message"=>"Nobody is loggedIn!");
            }
        }
        
    }//END class



?>