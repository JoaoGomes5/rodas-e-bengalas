<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

class Intake {
    private $id;
    private $description;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function get_description() {
        return $this->description;
    }

    public function to_string(){
        $id = $this->get_id();
        $description = $this->get_description();

        return "[ id = '$id', description = '$description' ]";
    }
}

?>
