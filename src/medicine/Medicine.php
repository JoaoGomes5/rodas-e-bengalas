<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

class Medicine {
    private $id;
    private $quantity;
    private $activeIngredient;
    private $name;
    private $brand;
    private $intake;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_quantity($quantity) {
        $this->quantity = $quantity;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE medicine SET quantity = $quantity WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function get_quantity() {
        return $this->quantity;
    }

    public function set_active_ingredient($activeIngredient) {
        $this->activeIngredient = $activeIngredient;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE medicine SET activeIngredient = $activeIngredient WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function get_active_ingredient() {
        return $this->activeIngredient;
    }

    public function set_name($name) {
        $this->name = $name;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE medicine SET name = $name WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function get_name() {
        return $this->name;
    }

    public function set_brand($brand) {
        $this->brand = $brand;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE medicine SET brand = $brand WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function get_brand() {
        return $this->brand;
    }

    public function set_intake($intake) {
        $this->intake = $intake;
        $id = $this->get_id();
        $conn = get_connection();

        $sql = "UPDATE medicine SET intake = $intake WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function get_intake() {
        return $this->intake;
    }

    public static function create($quantity, $activeIngredient, $name, $brand, $intake){
        $conn = get_connection();

        $sql = "INSERT INTO medicine (quantity, activeIngredient, name, brand, intake) VALUES ('$quantity', '$activeIngredient', '$name', '$brand', '$intake')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();

            $medicine = new Medicine();
            $medicine = $medicine->get_last_inserted();

            return $medicine;
        } else {
            $conn->close();
            return false;
        }
    }

    public function update($quantity, $activeIngredient, $name, $brand, $intake) {
        $id = $this->get_id();
        $idBrand = $brand->get_id();
        $idIntake = $intake->get_id();
        $conn = get_connection();

        $sql = "UPDATE medicine SET quantity = $quantity, activeIngredient = $activeIngredient, name = $name, brand = $brand, intake = $intake WHERE id = $id";

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

        $sql = "DELETE * FROM medicine WHERE id = $id";

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

        $sql = "SELECT * FROM medicine WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $medicine = new Medicine();
            $medicine = $medicine->row_to_object($row);

            return $medicine;
        } else {
            $conn->close();
            return null;
        }
    }

    private function get_last_inserted(){
        $conn = get_connection();

        $sql = "SELECT * FROM medicine ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();

            $medicine = $this->row_to_object($row);

            return $medicine;
        } else {
            $conn->close();
            return null;
        }
    }

    private function row_to_object($medicine_row) {
        $medicine = new Medicine();

        $medicine->set_id($medicine_row["id"]);
        $medicine->set_quantity($medicine_row["quantity"]);
        $medicine->set_active_ingredient($medicine_row["activeIngredient"]);
        $medicine->set_name($medicine_row["name"]);
        $medicine->set_brand($medicine_row["brand"]);
        $medicine->set_intake($medicine_row["intake"]);

        return $medicine;
    }

    public static function get_all(){
        $conn = get_connection();

        $sql = "SELECT * FROM medicine";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $medicines[] = new Medicine();

            while($row = $result->fetch_assoc()) {
                $medicine = new Medicine();
                $medicine = $medicine->row_to_object($row);
                
                array_push($medicines, $medicine);
            }

            array_shift($medicines);
            $conn->close();
            return $medicines;
        } else {
            $conn->close();
            return null;
        }
    }

    public function to_string(){
        $id = $this->get_id();
        $quantity = $this->get_quantity();
        $activeIngredient = $this->get_active_ingredient();
        $name = $this->get_name();
        $brand = $this->get_brand();
        $intake = $this->get_intake();

        return "[ id = '$id', quantity = '$quantity', activeIngredient = '$activeIngredient', name = '$name', brand = '$brand', intake = '$intake' ]";
    }
}

?>
