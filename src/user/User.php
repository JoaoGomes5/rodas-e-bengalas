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
    private $email;
    private $password;
    private $type;
    private $firstName;
    private $lastName;
    private $photo;
    private $idHome;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_photo($photo) {
        $this->photo = $photo;
    }

    public function get_photo() {
        return $this->photo;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function get_email() {
        return $this->email;
    }
    public function set_password($password) {
        $this->password = $password;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_type($type) {
        $this->type = $type;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE users SET type = $type WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }

    }

    public function get_type() {
        return $this->type;
    }

    public function set_first_name($firstName) {
        $this->firstName = $firstName;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE users SET firstName = $firstName WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }

    }

    public function get_first_name() {
        return $this->firstName;
    }

    public function set_last_name($lastName) {
        $this->lastName = $lastName;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE users SET lastName = $lastName WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }

    }

    public function get_last_name() {
        return $this->lastName;
    }

    public function set_id_home($idHome) {
        $this->idHome = $idHome;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE users SET idHome = $idHome WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }

    }

    public function get_id_home() {
        return $this->idHome;
    }

    /*
    Devemos chamar a função da seguinte forma:
        $user = User::get_by_id(5);
    */
    public static function get_by_id(int $client_id) {
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
            $conn->close();
            return null;
        }
    }

    public static function get_by_email_and_password($email, $password) {
        $conn = get_connection();

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $user = new User();
            $user = $user->row_to_object($row);

            return $user;
        } else {
            $conn->close();
            return null;
        }
    }

    /*
    Devemos chamar a função da seguinte forma:
        $user = User::create(3, "João", "Brito", 0);
    */
    public static function create(string $email, string $password, int $type, string $firstName, string $lastName,string $photo, $idHome) {
        $conn = get_connection();
        $md5 = md5($password);
        
        $sql = "INSERT INTO users (email, password, type, firstName, lastName, photo) VALUES ('$email','$md5',$type, '$firstName', '$lastName', '$photo', $idHome)";

        

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            $user = new User();
            $user = $user->get_last_inserted();

            return $user;
        } else {
            $conn->close();
            return false;
        }
    }

    public static function update($fName,$lName,  $email, $password,  $url, $id) {
        $conn = get_connection();

        $sql = "UPDATE users SET firstName = '$fName', lastName = '$lName',email = '$email', photo = '$url', password = '$password'  WHERE id = '$id'";


        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return $sql;
        } else {
            $conn->close();
            return false;
        }
    }

    private function get_last_inserted(){
        $conn = get_connection();

        $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $user = $this->row_to_object($row);

            return $user;
        } else {
            $conn->close();
            return null;
        }
    }

    private function row_to_object($user_row) {
        $user = new User();

        $user->set_id($user_row["id"]);
        $user->set_email($user_row["email"]);
        $user->set_password($user_row["password"]);
        $user->set_type($user_row["type"]);
        $user->set_first_name($user_row["firstName"]);
        $user->set_last_name($user_row["lastName"]);
        $user->set_photo($user_row["photo"]);
        $user->set_id_home($user_row["idHome"]);

        return $user;
    }

   
    public static function gets_by_home(int $idHome){
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
            $conn->close();
            return null;
        }
    }

    public static function gets_by_home_type(int $idHome, int $type){
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
            $conn->close();
            return null;
        }
    }
    public static function get_by_type($type){
        $conn = get_connection();

        $sql = "SELECT * FROM users WHERE type = $type";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $users[] = new User();

            while($row = $result->fetch_assoc()) {
                $user = new User();
                $user = $user->row_to_object($row);
                
                array_push($users, $user);
            }

            array_shift($users);
            $conn->close();
            return $users;
        } else {
            $conn->close();
            return null;
        }
    }
    public static function get_all(){
        $conn = get_connection();

        $sql = "SELECT * FROM users ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $users[] = new User();

            while($row = $result->fetch_assoc()) {
                $user = new User();
                $user = $user->row_to_object($row);
                
                array_push($users, $user);
            }

            array_shift($users);
            $conn->close();
            return $users;
        } else {
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
