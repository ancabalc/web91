<?php
    require_once "DB.php";
    
    class UsersModel extends DB {
        
        function insertUser($user){
            
            $sql = "INSERT INTO users (name,email,password,role) VALUES (?,?,?,?)";
            
            $stmt= $this->dbh->prepare($sql);
            $stmt->execute(array($user['name'],
                                 $user['email'],
                                 $user['password'],
                                 $user['role']
                          ));
            return array("rowsAffected"=>$stmt->rowCount(),"errorCode"=> $stmt->errorInfo()[1],"errorMsg"=> $stmt->errorInfo()[2]);
        }
        
    }//END class