<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

class Intake {
    private $idIntake;
    private $description;

    public function set_id_intake($idIntake) {
        $this->idIntake = $idIntake;
    }

    public function get_id_intake() {
        return $this->idIntake;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function get_description() {
        return $this->description;
    }

    public function to_string(){
        $idIntake = $this->get_id_intake();
        $description = $this->get_description();

        return "[ idIntake = '$idIntake', description = '$description' ]";
    }
}

?>
