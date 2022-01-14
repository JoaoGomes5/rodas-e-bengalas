<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

class Brand {
    private $id;
    private $name;
    private $description;

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

        $sql = "UPDATE brand SET name = $name WHERE id = $id";

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

    public function set_description($description) {
        $this->description = $description;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE brand SET description = $description WHERE id = $id";

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

    public function update_brand($name, $description) {
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE brand SET name = $name, description = $description WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public static function create_brand($name, $description){
        $conn = get_connection();

        $sql = "INSERT INTO brand (name, description) VALUES ('$name', '$description')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            $brand = new Brand();
            $brand = $brand->get_last_inserted_brand();

            return $brand;
        } else {
            $conn->close();
            return false;
        }
    }

    public static function get_brand_by_id(int $brand_id) {
        $conn = get_connection();

        $sql = "SELECT * FROM brand WHERE id = $brand_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $brand = new Brand();
            $brand = $brand->row_to_object($row);

            return $brand;
        } else {
            $conn->close();
            return null;
        }
    }

    private function get_last_inserted_brand(){
        $conn = get_connection();

        $sql = "SELECT * FROM brand ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $brand = $this->row_to_object($row);

            return $brand;
        } else {
            $conn->close();
            return null;
        }
    }

    public function delete_brand()  {
        $conn = get_connection();
        $id = $this->get_id();

        $sql = "DELETE * FROM brand WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    private function row_to_object($brand_row) {
        $brand = new Brand();

        $brand->set_id($brand_row["id"]);
        $brand->set_name($brand_row["name"]);
        $brand->set_description($brand_row["description"]);

        return $brand;
    }

    public function to_string(){
        $id = $this->get_id();
        $name = $this->get_name();
        $description = $this->get_description();

        return "[ id = '$id', name = '$name', description = '$description' ]";
    }
}

?>
