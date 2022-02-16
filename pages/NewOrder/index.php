<?php
require_once(dirname(__FILE__, 3) . "/src/api/request_api.php");
require_once(dirname(__FILE__, 3) . "/src/modal/Modal.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $medicine_reference = $_POST['medicine_reference'];
  $home_id = $_POST['home_id'];
  $quantity = $_POST['quantity'];

  $order = array(
    "medicine_reference" => $medicine_reference,
    "home_id" => $home_id,
    "quantity" => $quantity
  );

  $order = json_encode($order);

  $response = requestApi("POST", "http://localhost:3333/orders", $order);
  $response = json_decode($response, true);

  if ($response["error"] != null) header("location: index.php?err=1?msg=" . $response["error"]);

  else header("location: index.php?succ=1"); // Encomenda efetuada
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.png">
  <script src="https://cdn.tailwindcss.com"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="./index.js"></script>


  <title>Admin | Dashboard</title>
  
</head>
<body>


<div class="header-container fixed w-full z-10 top-0">
    <header class="header">
      <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
        <a href="../ManageUsers" class="bg-gray-400 hover:bg-gray-500 py-3    px-3 rounded inline-flex items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#FFF">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                  </a>
          <div class="flex justify-start lg:w-0 lg:flex-1">
            <a href="#">
              <span class="sr-only">Rodas e Bengalas</span>
              <img class="h-20" src="../../assets/images/icon.png" alt="">
            </a>
          </div>
        
          <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
            <a href="../Profile" class="">

                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" src="https://avatars.githubusercontent.com/u/60653037?v=4%27" alt="">
                        </div>

            </a>

            <a href="../../src/session/logout.php" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-10 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-red-400 hover:bg-red-500">
              Sair
            </a>
          </div>
          </div>
        </header>
</div>

<div class="content">
  
<?php
  if (isset($_GET["err"]) || isset($_GET["succ"])) {
    if ($_GET["err"] == 1) {
      echo (create_error_modal($_GET["msg"]));
    } else if ($_GET["succ"] == 1) {
      echo (create_success_modal("Encomenda realizada"));
    }
  }
?>
  
    <form class="create-orphanage-form" method="POST">
          <fieldset>
            <legend>Nova Encomenda</legend>
            <div class="input-block">
              <label for="medicine_reference">Referência do Medicamento</label>
                <input 
                  required
                  id="medicine_reference" 
                  name="medicine_reference"
                />
            </div>

            <div class="input-block">
              <label for="home_id">Id do Lar</label>
                <input 
                  required
                  id="home_id" 
                  name="home_id"
                  autocomplete="off"
                />
            </div>

            <div class="input-block">
              <label for="quantity">Quantidade</label>
              <input 
                  type="number"
                  required
                  id="quantity" 
                  name="quantity"
                  autocomplete="off"
                />
            </div>

            
          </fieldset>

        
          <button class="confirm-button" type="submit">
            Confirmar
          </button>
        </form>
    
</div>




</body>
</html>
