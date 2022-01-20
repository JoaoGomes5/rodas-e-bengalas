<?php
  require_once(dirname(__FILE__, 3) . "/src/user/User.php");
  $users = User::get_all();
  session_start();

  $_SESSION['photo'] ='https://pbs.twimg.com/profile_images/1214689195740057601/JXzTqXbS_400x400.jpg';
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

   <!-- JIT SUPPORT, for using peer-* below -->
   <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>


  <title>Admin | Dashboard</title>
  
</head>
<body>


<div class="header-container fixed w-full z-10 top-0">
    <header class="header">
      <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
      <a href="../TechnicianDashboard" class="bg-gray-400 hover:bg-gray-500 py-3    px-3 rounded inline-flex items-center ">
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
                          <img class="h-10 w-10 rounded-full" src="<?= $_SESSION['photo'];?>" alt="">
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
  
  
<form class="create-orphanage-form" method="POST">
          <fieldset>
            <legend> Registo de terapêutica</legend>
            

              
            <div class="input-block">
              <label for="name">Utente</label>
                <div class="sel sel--black-panther">
                  <select name="select-profession" id="select-profession">
                    <option value="" disabled>Selecione um utente</option>

                    <?php foreach($users as $user) : ?>
                      <option value="hacker"><?php echo $user->get_first_name(); ?> </option>
                    <?php endforeach ?>
                  
                  </select>
                </div>
            </div>

            <div class="input-block">
              <label for="name">Medicamento</label>
                
                   <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
               
            </div>
          </fieldset>


          <fieldset>
            <legend>Informações</legend>
            <div class="input-block">
              <label for="name">Nome</label>
                <input 
                  required
                  id="name" 
                  name="name"
                />
            </div>

            <div class="input-block">
              <label for="activeIngredient">Ingrediente ativo</label>
                <input 
                  required
                  id="activeIngredient" 
                  name="activeIngredient"
                />
            </div>

            <div class="input-block">
              <label for="brand">Marca</label>
                <input 
                  required
                  id="brand" 
                  name="brand"
                />
            </div>

            <div class="input-block">
              <label for="intake">Toma</label>
                <input 
                  required
                  id="intake" 
                  name="intake"
                />
            </div>

            <div class="input-block">
              <label for="stock">Stock</label>
                <input 
                  required
                  id="stock" 
                  name="stock"
                  type="number"
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