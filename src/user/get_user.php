<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/DSOS/rodas-e-bengalas/src/database/connection.php");

    function get_client_by_id(int $client_id) {
        $conn = get_connection();

        $sql = "SELECT * FROM users WHERE idUser = $client_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $conn->close();
                return $row;
            }
        } else {
            echo "0 results";
            $conn->close();
            return null;
        }

    }

?>