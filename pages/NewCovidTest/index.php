<?php
require_once(dirname(__FILE__, 3) . "/src/api/request_api.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $nif = $_POST['nif'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $resultado = $_POST['resultado'];
  
  switch ($resultado) {
    case "negativo":
      $resultado = false;
      break;

    case "positivo":
      $resultado = true;
      break;
    
    default:
      header("location: index.php?err=1"); // Deve selecionar uma opção do select de resultado de teste covid
      break;
  }

  $user_info = array(
    "nif" => $nif,
    "name" => $name,
    "email" => $email,
    "phone" => $phone
  );

  $user_test = array(
    "user" => $user_info,
    "result" => $resultado
  );

  $user_test = json_encode($user_test);

  $response = requestApi("POST", "http://localhost:3333/tests", $user_test);
  header("location: index.php?succ=1");
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
  
  
    <form class="create-orphanage-form" method="POST" action="#">
          <fieldset>
            <legend>Informação do Utente</legend>
            <div class="input-block">
              <label for="name">Nome</label>
                <input 
                  required
                  id="name" 
                  name="name"
                />
            </div>


            <div class="input-block">
              <label for="nif">NIF</label>
              <input 
                  type="number"
                  required
                  id="nif" 
                  name="nif"
                  autocomplete="off"
                />
            </div>

            <div class="input-block">
              <label for="email">E-Mail</label>
                <input 
                  type="email"
                  required
                  id="email" 
                  name="email"
                  autocomplete="off"
                />
            </div>

            <div class="input-block">
              <label for="phone">Contacto Telefónico</label>
                <input 
                  required
                  id="phone" 
                  name="phone"
                  autocomplete="off"
                />
            </div>

            <legend class="mt-10">Informação do Teste</legend>
            <div class="input-block">
              <label for="result">Resultado</label>
                  <div class="flex justify-center">
                  <div class="mb-3 xl:w-96">
                    <select name="resultado" class="
                    w-full
                      form-select
                      appearance-none
                      block
                      px-3
                      py-1.5
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" aria-label="Default select example">
                        <option id="default" value="default" selected>Indique o resultado do teste</option>
                        <option id="positivo" value="positivo">Positivo</option>
                        <option id="negativo" value="negativo">Negativo</option>
                    </select>
                  </div>
                </div>
            </div>
           
          </fieldset>

        
          <button class="confirm-button" type="submit">
            Confirmar
          </button>
        </form>
    
</div>




</body>
</html>
