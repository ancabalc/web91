<?php

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