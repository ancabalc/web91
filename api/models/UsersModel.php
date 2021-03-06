<?php

    require_once "DB.php";
    
    class UsersModel extends DB {
         function listTopProviders () {
        $sql = "select id, name, description, image from users where role = 'provider' order by id desc limit 3";
        
        $stmt=$this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
         }

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
        
        function getUsersById($id) {
            $sql = "select * from users where id=" . $id;
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            return $sth->fetch(PDO::FETCH_ASSOC);
        }

        //============INSERT USER===========\\
        
        function insertUser($user){
            
            $sql = "INSERT INTO users (name,email,password,role,job,description,image) VALUES (?,?,?,?,?,?,?)";
            
            $stmt= $this->dbh->prepare($sql);
            $stmt->execute(array($user['name'],
                                 $user['email'],
                                 $user['password'],
                                 $user['role'],
                                 $user['job'],
                                 $user['description'],
                                 $user['image_name']
                          ));
            return array("rowsAffected"=>$stmt->rowCount(),"errorCode"=> $stmt->errorInfo()[1],"errorMsg"=> $stmt->errorInfo()[2]);
        }

        function checkUser($email, $pass) 
        {
            //$sql = 'select first_name, last_name, email, id from users where email = ? and password = ?'; NOT WORKING
            $sql = 'SELECT name,email,id FROM users where email = ? and password = ?'; // corrected select query
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($email, 
                                $pass));
            return $stmt->fetch(PDO::FETCH_ASSOC);    
        }
        
}//END class