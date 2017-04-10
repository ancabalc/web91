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


}