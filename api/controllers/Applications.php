
<?php 
    
     require "models/ApplicationsModel.php";
     
     class Applications {
        
        function createItem() {
            // if (!isset($_SESSION["isActive"]) || $_SESSION["isActive"] !== TRUE) {
            //     http_response_code(401);
            //     return array("error"=>"Unauthorized. You have to be logged.");
            // }
            
            
            if (!empty($_POST['title']) && !empty($_POST['description'])) {
                $_POST['main_image_url'] = NULL;
            //   if(!empty($_FILES['main_image_url'])){
            //         $file = $_FILES['main_image_url'];
            //         move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
            //         $_POST['main_image_url'] = $file["name"];
                
            //    }
                $appAdd = new ApplicationsModel;
                return $appAdd->insertItem($_POST);
            } else {
                return "Fields are required";
            }
        }
    
    }
     
