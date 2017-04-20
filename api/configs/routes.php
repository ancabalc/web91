<?php

    $routes = array();
    $routes['/api/users/update'] = array( "class" => "", "method" => "");
    $routes['/aplication/add'] = array("class"=>"Applications", "method"=>"createItem"); 
    $routes['/accounts/login'] = array("class"=>"Accounts", "method"=>"login");
    $routes['/users/update'] = array("class" => "Users", "method" => "updateUser");
    $routes['/accounts/create'] = array( "class" => "Accounts", "method" => "createAccount");

?>