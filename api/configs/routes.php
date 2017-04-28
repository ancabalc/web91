<?php


    $routes['/aplication/add'] = array("class"=>"Applications", "method"=>"createItem"); 
    $routes['/accounts/login'] = array("class"=>"Accounts", "method"=>"login");
    $routes['/users/list'] = array ("class"=> "Users", "method" => "listTopProviders");
    $routes['/users/update'] = array("class" => "Users", "method" => "updateUser");
    $routes['/users/list'] = array ("class"=> "Users", "method" => "listTopProviders");
    $routes['/accounts/create'] = array( "class" => "Accounts", "method" => "createAccount");
    $routes['/accounts/checkSession'] = array( "class" => "Accounts", "method" => "checkSession");
    $routes['/accounts/logout'] = array("class"=>"Accounts", "method"=>"logout");

?>
