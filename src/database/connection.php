<?php

function get_connection(){
     $password = "";
     $Jpassword = "mysql";
     $server = "localhost"; //serverName\instanceName
     $mysql_user = "root";
     $mysql_password = $password;
     $database = "rodasbengalas";

    $conn = mysqli_connect($server, $mysql_user, $mysql_password, $database);
    
    if($conn) {
         return $conn;
    }else {
         echo "Error";
         return null;
    }
}

?>