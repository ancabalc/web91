<?php

    require_once "DB.php";
    
    class UsersModel extends DB {

        //==========UPDATEING USER==========\\
        function updateUser($data) {
            $params = [':id' => $data["id"],
                       ':name' => $data["name"],
                       ':description' => $data["description"],
                       ':image' => $data["image"]];
            
            $sql = 'UPDATE users SET name=:name, description=:description, image=:image WHERE id=:id';
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            return $sth->rowCount();
        }

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
        
        function checkUser($email, $pass) 
        {
            $sql = 'select first_name, last_name, email, id from users where email = ? and password = ?';
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($email, 
                                $pass));
            return $stmt->fetch(PDO::FETCH_ASSOC);    
        }
        
    }//END class
