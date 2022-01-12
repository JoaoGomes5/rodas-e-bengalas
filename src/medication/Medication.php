<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");
require_once(dirname(__FILE__, 3) . "/src/user/User.php");
require_once(dirname(__FILE__, 3) . "/src/medicineMedication/MedicineMedication.php");

class Medication {
    private $id;
    private User $technician;
    private User $client;
    private MedicineMedication $medicineMedication;
    private $startDate;
    private $endDate;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_technician($technician) {
        $this->technician = $technician;
    }

    public function get_technician() {
        return $this->technician;
    }

    public function set_client($client) {
        $this->client = $client;
    }

    public function get_client() {
        return $this->client;
    }

    public function set_medication_specification($medicineMedication) {
        $this->medicineMedication = $medicineMedication;
    }

    public function get_medication_specification() {
        return $this->medicineMedication;
    }

    public function set_start_date($startDate) {
        $this->startDate = $startDate;
    }

    public function get_start_date() {
        return $this->startDate;
    }

    public function set_end_date($endDate) {
        $this->endDate = $endDate;
    }

    public function get_end_date() {
        return $this->endDate;
    }

    public function to_string(){
        $id = $this->get_id();
        $technician = $this->get_technician();
        $client = $this->get_client();
        $medicineMedication = $this->get_medication_specification();
        $startDate = $this->get_start_date();
        $endDate = $this->get_end_date();

        return "[ id = '$id', technician = '$technician->to_string()', client = '$client->to_string()', medicineMedication = '$medicineMedication->to_string()', startDate = '$startDate', endDate = '$endDate' ]";
    }
}

?>
