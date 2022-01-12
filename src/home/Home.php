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

    public function to_string(){
        $id = $this->get_id();
        $district = $this->get_district();
        $address = $this->get_address();
        $description = $this->get_description();

        return "[ id = '$id', district = '$district->to_string()', address = '$address', description = '$description' ]";
    }
}

?>
