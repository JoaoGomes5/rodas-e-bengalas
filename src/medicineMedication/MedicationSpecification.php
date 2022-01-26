<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");
require_once(dirname(__FILE__, 3) . "/src/medicine/Medicine.php");
require_once(dirname(__FILE__, 3) . "/src/medicationSpecification/Medication.php");

class MedicationSpecification {
    private $id;
    private Medicine $medicine;
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

    public static function create($medicine, $medication, $startDate, $endDate, $intakeFrequency, $isSOS, $isSingleDose, $quantity){
        $id_medicine = $medicine->get_id();
        $id_medication = $medication->get_id();
        $conn = get_connection();

        $sql = "INSERT INTO medicinemedication (idMedicine, idMedication, startDate, endDate, intakeFrequency, isSOS, isSingleDose, quantity) VALUES ('$id_medicine', '$id_medication', '$startDate', '$endDate', '$intakeFrequency', '$isSOS', '$isSingleDose', '$quantity')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            $medicationSpecification = new MedicationSpecification();
            $medicationSpecification = $medicationSpecification->get_last_inserted();

            return $medicationSpecification;
        } else {
            $conn->close();
            return false;
        }
    }

    public function update($medicine, $medication, $startDate, $endDate, $intakeFrequency, $isSOS, $isSingleDose, $quantity) {
        $id = $this->get_id();
        $id_medicine = $medicine->get_id();
        $id_medication = $medication->get_id();
        $conn = get_connection();

        $sql = "UPDATE medicinemedication SET idMedicine = $id_medicine, idMedication = $id_medication, startDate = $startDate, endDate = $endDate, intakeFrequency = $intakeFrequency, isSOS = $isSOS, isSingleDose = $isSingleDose, quantity = $quantity WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function delete()  {
        $conn = get_connection();
        $id = $this->get_id();

        $sql = "DELETE * FROM medicinemedication WHERE id = $id";

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

        $sql = "SELECT * FROM medicinemedication WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $medicationSpecification = new MedicationSpecification();
            $medicationSpecification = $medicationSpecification->row_to_object($row);

            return $medicationSpecification;
        } else {
            $conn->close();
            return null;
        }
    }

    public static function get_all(){
        $conn = get_connection();

        $sql = "SELECT * FROM medicinemedication";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $medicationSpecifications[] = new MedicationSpecification();

            while($row = $result->fetch_assoc()) {
                $medicationSpecification = new MedicationSpecification();
                $medicationSpecification = $medicationSpecification->row_to_object($row);
                
                array_push($medicationSpecifications, $medicationSpecification);
            }

            array_shift($medicationSpecifications);
            $conn->close();
            return $medicationSpecifications;
        } else {
            $conn->close();
            return null;
        }
    }

    private function get_last_inserted(){
        $conn = get_connection();

        $sql = "SELECT * FROM medicinemedication ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $medicationSpecification = $this->row_to_object($row);

            return $medicationSpecification;
        } else {
            $conn->close();
            return null;
        }
    }

    private function row_to_object($medicationSpecification_row) {
        $medicationSpecification = new MedicationSpecification();
        $medicine = Medicine::get_by_id($medicationSpecification_row["idMedicine"]);
        $medication = Medication::get_by_id($medicationSpecification_row["idMedication"]);

        $medicationSpecification->set_id($medicationSpecification_row["id"]);
        $medicationSpecification->set_medicine($medicine);
        $medicationSpecification->set_start_date($medicationSpecification_row["startDate"]);
        $medicationSpecification->set_end_date($medicationSpecification_row["endDate"]);
        $medicationSpecification->set_intake_frequency($medicationSpecification_row["intakeFrequency"]);
        $medicationSpecification->set_is_sos($medicationSpecification_row["isSOS"]);
        $medicationSpecification->set_is_single_dose($medicationSpecification_row["isSingleDose"]);
        $medicationSpecification->set_quantity($medicationSpecification_row["quantity"]);

        return $medicationSpecification;
    }

    public function to_string(){
        $id = $this->get_id();
        $medicine = $this->get_medicine();
        $startDate = $this->get_start_date();
        $endDate = $this->get_end_date();
        $intakeFrequency = $this->get_intake_frequency();
        $isSOS = $this->get_is_sos();
        $isSingleDose = $this->get_is_single_dose();
        $quantity = $this->get_quantity();

        return "[ id = '$id', medicine = '$medicine->to_string()', startDate = '$startDate', endDate = '$endDate', intakeFrequency = '$intakeFrequency', isSOS = '$isSOS', isSingleDose = '$isSingleDose', quantity = '$quantity' ]";
    }
}

?>
