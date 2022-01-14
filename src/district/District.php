<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

class District {
    private $id;
    private $name;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_name($name) {
        $this->name = $name;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE districts SET name = $name WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function get_name() {
        return $this->name;
    }

    public function update($name) {
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE districts SET name = $name WHERE id = $id";

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

        $sql = "SELECT * FROM districts WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $district = new District();
            $district = $district->row_to_object($row);

            return $district;
        } else {
            $conn->close();
            return null;
        }
    }

    private function row_to_object($district_row) {
        $district = new District();

        $district->set_id($district_row["id"]);
        $district->set_name($district_row["name"]);

        return $district;
    }

    private function get_last_inserted(){
        $conn = get_connection();

        $sql = "SELECT * FROM districts ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $district = $this->row_to_object($row);

            return $district;
        } else {
            $conn->close();
            return null;
        }
    }

    public static function create($name){
        $conn = get_connection();

        $sql = "INSERT INTO districts (name) VALUES ('$name')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            $district = new District();
            $district = $district->get_last_inserted();

            return $district;
        } else {
            $conn->close();
            return false;
        }
    }

    public function delete()  {
        $conn = get_connection();
        $id = $this->get_id();

        $sql = "DELETE * FROM districts WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function to_string(){
        $id = $this->get_id();
        $name = $this->get_name();

        return "[ id = '$id', name = '$name' ]";
    }
}

?>
