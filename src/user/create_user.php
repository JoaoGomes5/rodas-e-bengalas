<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/rodas-e-bengalas/src/database/connection.php");

    function create_user(int $type, string $firstName, string $lastName, int $idHome) {
        $conn = get_connection();

        if ($idHome == 0) $sql = "INSERT INTO users (type, firstName, lastName) VALUES ('$type', '$firstName', '$lastName')";
        else $sql = "INSERT INTO users (type, firstName, lastName, idHome) VALUES ('$type', '$firstName', '$lastName', '$idHome')";

        

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo "New record created successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $conn->close();
            return false;
        }
    }
    
?>