<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

class Intake {
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

        $sql = "UPDATE intake SET name = $name WHERE id = $id";

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

        $sql = "UPDATE intake SET name = $name WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public static function create($name){
        $conn = get_connection();

        $sql = "INSERT INTO intake (name) VALUES ('$name')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            $intake = new Intake();
            $intake = $intake->get_last_inserted();

            return $intake;
        } else {
            $conn->close();
            return false;
        }
    }

    public function delete()  {
        $conn = get_connection();
        $id = $this->get_id();

        $sql = "DELETE * FROM intake WHERE id = $id";

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

        $sql = "SELECT * FROM intake WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $intake = new Intake();
            $intake = $intake->row_to_object($row);

            return $intake;
        } else {
            $conn->close();
            return null;
        }
    }

    private function get_last_inserted(){
        $conn = get_connection();

        $sql = "SELECT * FROM intake ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $intake = $this->row_to_object($row);

            return $intake;
        } else {
            $conn->close();
            return null;
        }
    }

    private function row_to_object($intake_row) {
        $intake = new Intake();

        $intake->set_id($intake_row["id"]);
        $intake->set_name($intake_row["name"]);

        return $intake;
    }

    public function to_string(){
        $id = $this->get_id();
        $name = $this->get_name();

        return "[ id = '$id', name = '$name' ]";
    }
}

?>
