<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");
require_once(dirname(__FILE__, 3) . "/src/district/District.php");

class Home {
    private $id;
    private District $district;
    private $address;
    private $description;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_district($district) {
        $this->district = $district;
        $id = $this->get_id();
        $id_district = $district->get_id();
        $conn = get_connection();

        $sql = "UPDATE homes SET idDistrict = $id_district WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function get_district() {
        return $this->district;
    }

    public function set_address($address) {
        $this->address = $address;
    }

    public function get_address() {
        return $this->address;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function get_description() {
        return $this->description;
    }

    public function update($district, $address, $description) {
        $id = $this->get_id();
        $id_district = $district->get_id();
        $conn = get_connection();

        $sql = "UPDATE homes SET idDistrict = $id_district, address = $address, description = $description WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public static function create($district, $address, $description){
        $id_district = $district->get_id();
        $conn = get_connection();

        $sql = "INSERT INTO homes (idDistrict, address, description) VALUES ('$id_district', '$address', '$description')";

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

    public function delete()  {
        $conn = get_connection();
        $id = $this->get_id();

        $sql = "DELETE * FROM homes WHERE id = $id";

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
        $district = District::get_by_id($home_row["idDistrict"]);

        $home->set_id($home_row["id"]);
        $home->set_district($district);
        $home->set_description($home_row["description"]);

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
