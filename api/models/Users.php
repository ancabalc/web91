<?php
    require_once "DB.php";
    
    class Users extends DB 
    {
        function checkUser($email, $pass) 
        {
            $sql = 'select first_name, last_name, email, id from users where email = ? and password = ?';
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array($email, 
                                $pass));
            return $stmt->fetch(PDO::FETCH_ASSOC);    
        }
    }