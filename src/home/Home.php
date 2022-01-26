<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");
require_once(dirname(__FILE__, 3) . "/src/district/District.php");

class Home {
    private $id;
    private $name;
    private $address;
    private $description;
    private $photo;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function get_name() {
        return $this->name;
    }

    public function set_address($address) {
        $this->address = $address ;
    }

    public function get_address() {
        return $this->address;
    }

    public function set_description($description) {
        $this->description = $description;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE homes SET description = $description WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function get_description() {
        return $this->description;
    }

    public function set_photo($photo) {
        $this->photo = $photo ;
    }

    public function get_photo() {
        return $this->photo;
    }

    public static function get_all(){
        $conn = get_connection();

        $sql = "SELECT * FROM homes ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $homes[] = new Home();

            while($row = $result->fetch_assoc()) {
                $home = new Home();
                $home = $home->row_to_object($row);
                
                array_push($homes, $home);
            }

            array_shift($homes);
            $conn->close();
            return $homes;
        } else {
            $conn->close();
            return null;
        }
    }

    public static function update($name, $address, $description, $photo, $id) {
        $conn = get_connection();

        $sql = "UPDATE homes SET name = '$name', address = '$address', description = '$description', photo = '$photo'  WHERE id = '$id'";


        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public static function create($name, $address, $description, $photo){
        $conn = get_connection();

        $sql = "INSERT INTO homes (name, address, description, photo) VALUES ('$name', '$address', '$description', '$photo')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            $home = new Home();
            $home = $home->get_last_inserted();

            return $home;
        } else {
            $conn->close();
            return false;
        }
    }

    public static function delete($id)  {
        $conn = get_connection();

        $sql = "DELETE  FROM homes WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public static function get_by_id(int $id) {
        $conn = get_connection();

        $sql = "SELECT * FROM homes WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $home = new Home();
            $home = $home->row_to_object($row);

            return $home;
        } else {
            $conn->close();
            return null;
        }
    }

    private function get_last_inserted(){
        $conn = get_connection();

        $sql = "SELECT * FROM homes ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $home = $this->row_to_object($row);

            return $home;
        } else {
            $conn->close();
            return null;
        }
    }

    private function row_to_object($home_row) {
        $home = new Home();

        $home->set_id($home_row["id"]);
        $home->set_name($home_row["name"]);
        $home-> set_address($home_row["address"]);
        $home-> set_description($home_row["description"]);
        $home-> set_photo($home_row["photo"]);

        return $home;
    }

    public function to_string(){
        $id = $this->get_id();
        $district = $this->get_district();
        $address = $this->get_address();
        $description = $this->get_description();

        return "[ id = '$id', district = '$district->to_string()', address = '$address', description = '$description' ]";
    }
}

?>
