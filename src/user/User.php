<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

/*
Forma de acesso aos dados de um utilizador:
    $user->get_first_name();
    $user->get_type();
    ...
*/
class User {
    private $id;
    private $type;
    private $firstName;
    private $lastName;
    private $idHome;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_type($type) {
        $this->type = $type;
    }

    public function get_type() {
        return $this->type;
    }

    public function set_first_name($firstName) {
        $this->firstName = $firstName;
    }

    public function get_first_name() {
        return $this->firstName;
    }

    public function set_last_name($lastName) {
        $this->lastName = $lastName;
    }

    public function get_last_name() {
        return $this->lastName;
    }

    public function set_id_home($idHome) {
        $this->idHome = $idHome;
    }

    public function get_id_home() {
        return $this->idHome;
    }

    /*
    Devemos chamar a função da seguinte forma:
        $user = User::get_client_by_id(5);
    */
    public static function get_client_by_id(int $client_id) {
        $conn = get_connection();

        $sql = "SELECT * FROM users WHERE id = $client_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $user = new User();
            $user = $user->row_to_object($row);

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
    public static function create_user(int $type, string $firstName, string $lastName, int $idHome) {
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

        $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $user = $this->row_to_object($row);

            return $user;
        } else {
            echo "0 results";
            $conn->close();
            return null;
        }
    }

    private function row_to_object($user_row) {
        $user = new User();

        $user->set_id($user_row["id"]);
        $user->set_type($user_row["type"]);
        $user->set_first_name($user_row["firstName"]);
        $user->set_last_name($user_row["lastName"]);
        $user->set_id_home($user_row["idHome"]);

        return $user;
    }

    public static function get_users_by_type(int $type){
        $conn = get_connection();

        $sql = "SELECT * FROM users WHERE type = $type";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $users_array[] = new User();

            while($row = $result->fetch_assoc()) {
                $user = new User();
                $user = $user->row_to_object($row);
                
                array_push($users_array, $user);
            }

            array_shift($users_array);
            $conn->close();
            return $users_array;
        } else {
            echo "0 results";
            $conn->close();
            return null;
        }
    }

    public static function get_users_by_home(int $idHome){
        $conn = get_connection();

        $sql = "SELECT * FROM users WHERE idHome = $idHome";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $users_array[] = new User();

            while($row = $result->fetch_assoc()) {
                $user = new User();
                $user = $user->row_to_object($row);
                
                array_push($users_array, $user);
            }

            array_shift($users_array);
            $conn->close();
            return $users_array;
        } else {
            echo "0 results";
            $conn->close();
            return null;
        }
    }

    public static function get_users_by_home_type(int $idHome, int $type){
        $conn = get_connection();

        $sql = "SELECT * FROM users WHERE idHome = $idHome AND type = $type";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $users_array[] = new User();

            while($row = $result->fetch_assoc()) {
                $user = new User();
                $user = $user->row_to_object($row);
                
                array_push($users_array, $user);
            }

            array_shift($users_array);
            $conn->close();
            return $users_array;
        } else {
            echo "0 results";
            $conn->close();
            return null;
        }
    }

    public function to_string(){
        $id = $this->get_id();
        $type = $this->get_type();
        $firstName = $this->get_first_name();
        $lastName = $this->get_last_name();
        $idHome = $this->get_id_home();

        return "[ id = '$id', type = '$type', firstName = '$firstName', lastName = '$lastName', idHome = '$idHome' ]";
    }
}

?>
