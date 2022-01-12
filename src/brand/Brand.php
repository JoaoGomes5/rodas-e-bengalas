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
    }

    public function get_name() {
        return $this->name;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function get_description() {
        return $this->description;
    }

    public function to_string(){
        $id = $this->get_id();
        $name = $this->get_name();
        $description = $this->get_description();

        return "[ id = '$id', name = '$name', description = '$description' ]";
    }
}

?>
