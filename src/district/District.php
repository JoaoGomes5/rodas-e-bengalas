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
    }

    public function get_name() {
        return $this->name;
    }

    public function to_string(){
        $id = $this->get_id();
        $name = $this->get_name();

        return "[ id = '$id', name = '$name' ]";
    }
}

?>
