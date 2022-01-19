<?php
    require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

    function import_csv(){
        /*
            Assumindo que a primeira linha é de dados e que os dados estão da seguinte forma:
                "
                    quantity1, activeIngredient1, name1, brand1, intake1
                    quantity2, activeIngredient2, name2, brand2, intake2
                "
        */
        $file_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_types)){
            
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                
                $file = fopen($_FILES['file']['tmp_name'], 'r');

                $conn = get_connection();
                
                // Saltar a primeira linha
                // fgetcsv($file);
                
                while(($line = fgetcsv($file)) !== FALSE){
                    // Get row data
                    $quantity   = $line[0];
                    $activeIngredient  = $line[1];
                    $name  = $line[2];
                    $brand = $line[3];
                    $intake = $line[4];

                    $sql = "INSERT INTO medicine (quantity, activeIngredient, name, brand, intake) VALUES ('$quantity', '$activeIngredient', '$name', '$brand', '$intake')";
                    
                    if ($conn->query($sql) === TRUE) {
                        $conn->close();
                        fclose($file);
                        return true;
                    } else {
                        $conn->close();
                        fclose($file);
                        return false;
                    }
                }
            }else{
                return false;
            }
        }else{
            return false; // ficheiro inválido
        }
    }
?>