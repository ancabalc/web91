<?php

   require_once "DB.php";
   
   class ApplicationsModel extends DB {
      
        function insertItem($item) {
        $sql = 'insert into applications (title, description, active) values(?,?,?)';

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($item['title'], 
                            $item['description'], 
                            $item['active']));
        
        return $this->dbh->lastInsertId();
    }
    
   }