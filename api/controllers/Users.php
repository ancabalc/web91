<?php
<<<<<<< HEAD
    require "models/UsersModels.php";
    
    class Users {
        private $UsersModel;
        
        function __construct () {
            $this->UsersModel=new UsersModel();
    } 
    
    function getTopProviders() {
        if (!empty($_GET['name'])) && !empty($_GET['description']) && !empty($_GET['image']),
    } 
    return $users->getTopProviders();
    }else{
        return array("error"=>"Something went wrong with your providers.");
    }
        
    
=======

    require_once "models/UsersModel.php";

    class Users {
        
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
>>>>>>> 19f4e33648791626c95fd0c5fc0b0a2a4980becc
