<?php

function get_connection(){
    $server = "localhost"; //serverName\instanceName
    $mysql_user = "root";
    $mysql_password = "";
    $database = "rodasbengalas";

    $conn = mysqli_connect($server, $mysql_user, $mysql_password, $database);
    
    if($conn) {
         return $conn;
    }else {
         return null;
    }
}

?>