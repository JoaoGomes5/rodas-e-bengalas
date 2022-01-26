<?php

function get_connection(){
     $password = "mysql";
     // $password = "Phpmyadmin1234!"; 
     $Jpassword = "mysql";
     $server = "localhost"; //serverName\instanceName
     $mysql_user = "root";
     $mysql_password = $password;
     $database = "rodasbengalas";

    $conn = mysqli_connect($server, $mysql_user, "", $database);
    
    if($conn) {
         return $conn;
    }else {
         echo "Error";
         return null;
    }
}

?>