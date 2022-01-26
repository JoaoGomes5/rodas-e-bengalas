<?php
require_once(dirname(__FILE__, 3) . "/src/home/Home.php");
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");


  $id = $_GET['id'];
  

   Home::delete($id);

   header("Location: ../../pages/AdminDashboard/index.php");
 


?>