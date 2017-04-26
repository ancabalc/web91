<?php

    require_once "models/UsersModel.php";

    class Users {
        
        //==========UPDATEING USER==========\\
        
        public function updateUser() {
  
            $errors = array();
            if (isset($_POST["name"],$_POST["description"],$_FILES["file"])) {
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
            else $errors["parameter"] = "Parameter count missmatch";
        }
}