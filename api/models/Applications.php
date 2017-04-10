<?php
require_once "DB.php";

class Aplications extends DB {
    function selectAll() {
        $sql = 'select * from aplications';
        return $this->selectSql($sql);
    }
    
    function insertItem($item) {
        $sql = 'insert into articles (aplications, category, offers, users) values(?, ?, ?, ?)';

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($item['aplications'], 
                            $item['category'], 
                            $item['offers'], 
                            $item['users']));
        
        return $this->dbh->lastInsertId();
    }
    
    function updateItem($item) {
        $sql = 'update aplications set aplications = ?, category = ?, offers = ?, users = ? ';
        
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($item['aplications'], 
                            $item['category'], 
                            $item['offers'], 
                            $item['users']));
        return $stmt->rowCount();
    }
    
    function deleteItem($id) {
        $sql = "delete from articles where id = ?";
        
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($id));
        return $stmt->rowCount(); 
    }
}