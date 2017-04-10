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