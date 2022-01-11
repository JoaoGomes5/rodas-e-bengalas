<?php

function get_connection(){
     $password = " ";
    $server = "localhost"; //serverName\instanceName
    $mysql_user = "root";
    $mysql_password = $password;
    $database = "rodasbengalas";

    $conn = mysqli_connect($server, $mysql_user, $mysql_password, $database);
    
    if($conn) {
         echo "Connected";
         return $conn;
    }else {
         echo "Error";
         return null;
    }
}

?>