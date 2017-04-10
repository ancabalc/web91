<?php
require "models/Users.php";
    class Accounts 
    {
        function login() 
        {
            if (!empty($_POST["email"]) && !empty($_POST["pass"])) 
            {
                $pass = crypt($_POST["pass"], PASS_SALT);
                $usersModel =  new Users();
                $user = $usersModel->checkUser($_POST["email"], $pass);
                if (is_array($user)) 
                {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["isLogged"] = TRUE;
                    $_SESSION["name"] = $user["first_name"] . " " . $user["last_name"];
                    return array("isLogged" => $_SESSION["isLogged"],
                    "user_id" => $_SESSION["user_id"]);
                } else 
                {
                    return array("error" => "Invalid credentials.");
                }
            } else
            {
                return array("error" => "Empty credentials.");    
            }
        }
    }
