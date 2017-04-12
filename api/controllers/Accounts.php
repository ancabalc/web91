<?php
    require_once "models/UsersModel.php";
    
    class Accounts {
        
        private $userModel;
        
        function __construct(){
            $this->userModel = new UsersModel();
        }
        
        //FIELDS: name, email, password, repassword, role
        function createAccount(){
            
            //Check if all required fields are received
            if(isset($_POST['name'],$_POST['email'],$_POST['password'],$_POST['repassword'],$_POST['role']) && 
            !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword']) && !empty($_POST['role'])){
            
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
               
               //check if role is valid 
               if(strtolower($_POST['role']) !== "provider" && strtolower($_POST['role']) !== "client"){
                   return array("success"=>false,"message"=>"Role not valid!");
               }
               
               //Encrypt password before storing it to DB
               //Replace user`s un-encrypted password with encrypted password
               $cryptPassword = crypt($_POST['password'],PASS_SALT);
               $_POST['password'] = $cryptPassword;
               
               //save user data to DB
               $dbResult = $this->userModel->insertUser($_POST);
               
               //return result after DB query success/fail
               if($dbResult['errorCode'] == null){
                   return array("success"=>true,"message"=>"Account created succesfully!");
               }else{
                    return array("success"=>false,"message"=>"Account creation failed. REASON: " . $dbResult['errorMsg']);
               }
          
            }else{
                
                //returned in case the not all fields are recieved
                return array("success"=>false,"message"=>"All fields are required!");
            }
        }//END createAccount method
        
        function login() 
        {
            if (!empty($_POST["email"]) && !empty($_POST["pass"])) 
            {
                $pass = crypt($_POST["pass"], PASS_SALT);
                $user = $this->usersModel->checkUser($_POST["email"], $pass);
                if (is_array($user)) 
                {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["isLogged"] = TRUE;
                    $_SESSION["name"] = $user["first_name"] . " " . $user["last_name"];
                    return array("isLogged" => $_SESSION["isLogged"],
                    "user_id" => $_SESSION["user_id"]);
                } else 
                {
                    return array("error" => "Invalid credentials.");
                }
            } else
            {
                return array("error" => "Empty credentials.");    
            }
        }
        
    }//END class

