<?php
require_once(dirname(__FILE__, 3) . "/src/home/Home.php");
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $photo = $_POST['url'];
  $address = $_POST['address'];

 try {
  $home = Home::create($name, $address, $description, $photo);

 } catch (\Throwable $th) {
  header("location: index.php?err=$th");
 }
  

  
  if ($home != null) { // Os dados inseridos são válidos
    header("location: ../AdminDashboard/index.php");
  } else { // Não existe utilizador com os dados inseridos
  
  }
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
      <a href="../AdminDashboard" class="bg-gray-400 hover:bg-gray-500 py-3    px-3 rounded inline-flex items-center ">
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
                          <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
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
  
  
<form action="" class="create-orphanage-form" method="post">
          <fieldset>
            <legend>Criar novo lar</legend>
            <div class="input-block">
              <label for="name">Nome</label>
                <input 
                  required
                  id="name" 
                  name="name"
                />
            </div>

            <div class="input-block">
              <label for="address">Morada</label>
                <textarea 
                  required
                  id="address" 
                  name="address"
                  maxLength={300} ></textarea>
            </div>

            <div class="input-block">
              <label for="url">URL da foto</label>
                <input 
                  required
                  id="url" 
                  name="url"
                />
            </div>

            <div class="input-block">
              <label for="description">Descrição</label>
                <textarea 
                  id="description"  
                  name="description"
                  maxLength={300} 
                  required
                  ></textarea>
            </div>

           
          </fieldset>

        
          <button class="confirm-button" type="submit">
            Confirmar
          </button>
        </form>
    
</div>




</body>
</html>