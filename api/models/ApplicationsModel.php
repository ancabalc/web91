<?php

   require_once "DB.php";
   
   class ApplicationsModel extends DB {
        function selectAll() {
            $sql = 'select * from aplications';
            return $this->selectSql($sql);
        }
        
        function insertItem() {
       
           
        }
   }