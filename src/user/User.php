<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

/*
Forma de acesso aos dados de um utilizador:
    $user->get_first_name();
    $user->get_type();
    ...
*/
class User {
    public $idUser;
    public $type;
    public $firstName;
    public $lastName;
    public $idHome;

    function set_id_user($idUser) {
        $this->idUser = $idUser;
    }

    function get_id_user() {
        return $this->idUser;
    }

    function set_type($type) {
        $this->type = $type;
    }

    function get_type() {
        return $this->type;
    }

    function set_first_name($firstName) {
        $this->firstName = $firstName;
    }

    function get_first_name() {
        return $this->firstName;
    }

    function set_last_name($lastName) {
        $this->lastName = $lastName;
    }

    function get_last_name() {
        return $this->lastName;
    }

    function set_id_home($idHome) {
        $this->idHome = $idHome;
    }

    function get_id_home() {
        return $this->idHome;
    }

    /*
    Devemos chamar a função da seguinte forma:
        $user = User::get_client_by_id(5);
    */
    static function get_client_by_id(int $client_id) {
        $conn = get_connection();

        $sql = "SELECT * FROM users WHERE idUser = $client_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $user = new User();
            $user = $user->save_data($row);

            return $user;
        } else {
            echo "0 results";
            $conn->close();
            return null;
        }
    }

    /*
    Devemos chamar a função da seguinte forma:
        $user = User::create_user(3, "João", "Brito", 0);
    */
    static function create_user(int $type, string $firstName, string $lastName, int $idHome) {
        $conn = get_connection();

        if ($idHome == 0) $sql = "INSERT INTO users (type, firstName, lastName) VALUES ('$type', '$firstName', '$lastName')";
        else $sql = "INSERT INTO users (type, firstName, lastName, idHome) VALUES ('$type', '$firstName', '$lastName', '$idHome')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            $user = new User();
            $user = $user->get_last_inserted_user();

            return $user;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $conn->close();
            return false;
        }
    }

    private function get_last_inserted_user(){
        $conn = get_connection();

        $sql = "SELECT * FROM users ORDER BY idUser DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $user = $this->save_data($row);

            return $user;
        } else {
            echo "0 results";
            $conn->close();
            return null;
        }
    }

    private function save_data($user_row) {
        $user = new User();

        $user->set_id_user($user_row["idUser"]);
        $user->set_type($user_row["type"]);
        $user->set_first_name($user_row["firstName"]);
        $user->set_last_name($user_row["lastName"]);
        $user->set_id_home($user_row["idHome"]);

        return $user;
    }
}

?>