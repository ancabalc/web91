<?php
    require "models/UsersModels.php";
    
    class Users {
        private $UsersModel;
        
        function __construct () {
            $this->UsersModel=new UsersModel();
    } 
    
    function getTopProviders() {
        if (!empty($_GET['name'])) && !empty($_GET['description']) && !empty($_GET['image']),
    } 
    return $users->hetTopProviders();
    }else{
        return array("error"=>"Something went wrong with your providers.");
    }
        
    