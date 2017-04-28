<?php
    $path = "models/UsersModel.php";
    require_once "views/users.js";
    
    require_once "$path";
    
    class Users {
        private $UsersModel;
        
        function __construct () {
            $this->usersModel=new UsersModel();
        }
    
        public function listTopProviders() {
            return $this->usersModel->listTopProviders();
            }
            
    //Update User

        function updateUser(){
        
            if(!empty($_POST['name']) || !empty($_POST['description']) || !empty($_POST['image']) || !empty($_POST['job']) ||!empty($_POST['id'])){
                $_POST['image'] = NULL;
                    if(!empty($_FILES['image'])){
                        $file = $_FILES['image'];
                        move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
                        $_POST['image'] = $file["name"];
                    }
                return $this->usersModel->updateItem($_POST);
            } else {
                return "All fields are required.";
        }
    }

}