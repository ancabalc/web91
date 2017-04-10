<?php
    require_once "models/UsersModel.php";
    class Accounts {
        
        private $userModel;
        
        function __construct(){
            $this->userModel = new UsersModel();
        }
        //FIELDS: name, email, password, repassword, role
        function createAccount(){
            
            if(isset($_POST['name'],$_POST['email'],$_POST['password'],$_POST['repassword'],$_POST['role']) && 
            !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword']) && !empty($_POST['role'])){
               
               if(!isValidEmail($_POST['email'])){
                   return array("success"=>false,"message"=>"Email address is not valid!");
               }
           
               if(strlen($_POST['password']) < 6 ){
                   return array("success"=>false,"message"=>"Password too short!");
               }
               
               if($_POST['password'] !== $_POST['repassword']){
                   return array("success"=>false,"message"=>"Passwords don`t match!");
               }
               if(strtolower($_POST['role']) !== "provider" && strtolower($_POST['role']) !== "client"){
                   return array("success"=>false,"message"=>"Role not valid!");
               }
               
               $cryptPassword = crypt($_POST['password'],PASS_SALT);
               $_POST['password'] = $cryptPassword;
               
               $dbResult = $this->userModel->insertUser($_POST);
               
               if($dbResult['errorCode'] == null){
                   return array("success"=>true,"message"=>"Account created succesfully!");
               }else{
                    return array("success"=>false,"message"=>"Account creation failed. REASON: " . $dbResult['errorMsg']);
               }
          
            }else{
                return array("success"=>false,"message"=>"All fields are required!");
            }
        }
        
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
    
 //Function to validate email using regex
    function isValidEmail($email){
        $regEx = '/^[a-z]{1}(?!.*(\.\.|\.@))[a-z0-9!#$%&*+\/=?_{|}~.-]{0,63}@(?=.{0,253}$)([a-z0-9]\.|[a-z0-9][a-z0-9-]{0,63}[a-z0-9]\.)+[a-z0-9]{1,63}$/mi';
        return preg_match($regEx,$email);
    }//END isValidEmail fuction
