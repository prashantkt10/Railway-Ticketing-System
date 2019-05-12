<?php

if(isset($_POST["username"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }	
    $mysqli = new mysqli('localhost' , 'root', 'pk.024680', 'railway');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
    $statement = $mysqli->prepare("SELECT username FROM users WHERE username=?");
    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->bind_result($username);
    if($statement->fetch()){
        die('<span class="glyphicon glyphicon-thumbs-down" style="color:red"> Username not available</span>');
     
    }else{
        die('<span class="glyphicon glyphicon-thumbs-up" style="color:green"> Username available</span>');
    }
}

?>
