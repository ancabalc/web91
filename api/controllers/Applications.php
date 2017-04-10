<<<<<<< HEAD
<?php
    require "models/ApplicationsModel.php";
    
    class Applications {
        private $ApplicationsModel;
        
        function __construct() {
            $this->ApplicationsModel = new ApplicationsModel();   
        }
        
        function getAll() {
            return $this->ApplicationsModel->selectAll();
        }
    
    }
=======
<?php 
    
     require "models/Application.php";
     
     
 
>>>>>>> 1f1d9396557e50ae774d62b6400edfb47b62e77c
