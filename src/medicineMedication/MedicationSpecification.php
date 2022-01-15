<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");
require_once(dirname(__FILE__, 3) . "/src/medicine/Medicine.php");
require_once(dirname(__FILE__, 3) . "/src/medication/Medication.php");

class MedicineMedication {
    private $id;
    private Medicine $medicine;
    private Medication $medication;
    private $startDate;
    private $endDate;
    private $intakeFrequency;
    private $isSOS;
    private $isSingleDose;
    private $quantity;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_medicine($medicine) {
        $this->medicine = $medicine;
    }

    public function get_medicine() {
        return $this->medicine;
    }

    public function set_medication($medication) {
        $this->medication = $medication;
    }

    public function get_medication() {
        return $this->medication;
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

    public function set_intake_frequency($intakeFrequency) {
        $this->intakeFrequency = $intakeFrequency;
    }

    public function get_intake_frequency() {
        return $this->intakeFrequency;
    }

    public function set_is_sos($isSOS) {
        $this->isSOS = $isSOS;
    }

    public function get_is_sos() {
        return $this->isSOS;
    }

    public function set_is_single_dose($isSingleDose) {
        $this->isSingleDose = $isSingleDose;
    }

    public function get_is_single_dose() {
        return $this->isSingleDose;
    }

    public function set_quantity($quantity) {
        $this->quantity = $quantity;
    }

    public function get_quantity() {
        return $this->quantity;
    }

    public function to_string(){
        $id = $this->get_id();
        $medicine = $this->get_medicine();
        $medication = $this->get_medication();
        $startDate = $this->get_start_date();
        $endDate = $this->get_end_date();
        $intakeFrequency = $this->get_intake_frequency();
        $isSOS = $this->get_is_sos();
        $isSingleDose = $this->get_is_single_dose();
        $quantity = $this->get_quantity();

        return "[ id = '$id', medicine = '$medicine->to_string()', medication = '$medication->to_string()', startDate = '$startDate', endDate = '$endDate', intakeFrequency = '$intakeFrequency', isSOS = '$isSOS', isSingleDose = '$isSingleDose', quantity = '$quantity' ]";
    }
}

?>
