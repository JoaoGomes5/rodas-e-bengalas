<?php
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

class Brand {
    private $idBrand;
    private $name;
    private $description;

    public function set_id_brand($idBrand) {
        $this->idBrand = $idBrand;
    }

    public function get_id_brand() {
        return $this->idBrand;
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
        $idBrand = $this->get_id_brand();
        $name = $this->get_name();
        $description = $this->get_description();

        return "[ idBrand = '$idBrand', name = '$name', description = '$description' ]";
    }
}

?>
