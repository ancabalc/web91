<?php
    $path = "models/UsersModel.php";
    
    require_once "$path";
    
    class Users {
        private $UsersModel;
        
        function __construct () {
            $this->usersModel=new UsersModel();
        }
    
        public function listTopProviders() {
            return $this->usersModel->listTopProviders();
            }
        
   
    //==========UPDATEING USER==========\\
 
        
        public function updateUser() {

  
            $errors = array();
            if (isset($_POST["name"])) {
                if (empty($_POST["name"])) {
                    $errors["name"] = "Name is required";
                }
                
                if (empty($_POST["description"])) {
                    $errors["description"] = "Description is required";
                }
                
                if (empty($_FILES["file"])) {
                    $file = $_FILES["file"];
                }
            }
        }
    }

 