<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");
require_once(dirname(__FILE__, 3) . "/src/user/User.php");
require_once(dirname(__FILE__, 3) . "/src/medicineMedication/MedicationSpecification.php");

class Medication {
    private $id;
    private User $technician;
    private User $client;
    private MedicationSpecification $medicineMedication;
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

    public static function create($technician, $client, $startDate, $endDate){
        $id_technician = $technician->get_id();
        $id_client = $client->get_id();
        $conn = get_connection();

        $sql = "INSERT INTO medication (idTechnician, idClient, startDate, endDate) VALUES ('$id_technician', '$id_client', '$startDate', '$endDate')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            $medication = new Medication();
            $medication = $medication->get_last_inserted();

            return $medication;
        } else {
            $conn->close();
            return false;
        }
    }

    public function update($technician, $client, $startDate, $endDate) {
        $id = $this->get_id();
        $id_technician = $technician->get_id();
        $id_client = $client->get_id();
        $conn = get_connection();

        $sql = "UPDATE medication SET idTechnician = $id_technician, idClient = $id_client, startDate = $startDate, endDate = $endDate WHERE id = $id";

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

        $sql = "DELETE * FROM medication WHERE id = $id";

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

        $sql = "SELECT * FROM medication WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $medication = new Medication();
            $medication = $medication->row_to_object($row);

            return $medication;
        } else {
            $conn->close();
            return null;
        }
    }

    private function get_last_inserted(){
        $conn = get_connection();

        $sql = "SELECT * FROM medication ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $medication = $this->row_to_object($row);

            return $medication;
        } else {
            $conn->close();
            return null;
        }
    }

    private function row_to_object($medication_row) {
        $medication = new Medication();
        $technician = User::get_by_id($medication_row["idTechnician"]);
        $client = User::get_by_id($medication_row["idClient"]);

        $medication->set_id($medication_row["id"]);
        $medication->set_technician($technician);
        $medication->set_client($client);
        $medication->set_start_date($medication_row["startDate"]);
        $medication->set_end_date($medication_row["endDate"]);

        return $medication;
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
