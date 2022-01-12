<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");
require_once(dirname(__FILE__, 3) . "/src/brand/Brand.php");
require_once(dirname(__FILE__, 3) . "/src/intake/Intake.php");

class Medicine {
    private $id;
    private $quantity;
    private $activeIngredient;
    private Brand $brand;
    private Intake $intake;

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_quantity($quantity) {
        $this->quantity = $quantity;
    }

    public function get_quantity() {
        return $this->quantity;
    }

    public function set_active_ingredient($activeIngredient) {
        $this->activeIngredient = $activeIngredient;
    }

    public function get_active_ingredient() {
        return $this->activeIngredient;
    }

    public function set_brand($brand) {
        $this->brand = $brand;
    }

    public function get_brand() {
        return $this->brand;
    }

    public function set_intake($intake) {
        $this->intake = $intake;
    }

    public function get_intake() {
        return $this->intake;
    }

    public function to_string(){
        $id = $this->get_id();
        $quantity = $this->get_quantity();
        $activeIngredient = $this->get_active_ingredient();
        $brand = $this->get_brand();
        $intake = $this->get_intake();

        return "[ id = '$id', quantity = '$quantity', activeIngredient = '$activeIngredient', brand = '$brand->to_string()', intake = '$intake->to_string()' ]";
    }
}

?>
