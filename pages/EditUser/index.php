<?php
require_once(dirname(__FILE__, 3) . "/src/user/User.php");
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

session_start();

$id = $_GET['id'];

$user = User::get_by_id($id);


if($_SERVER["REQUEST_METHOD"] == "POST") {
  $fName = $_POST['first-name'];
  $lName = $_POST['last-name'];
  $email = $_POST['email'];
  $new = $_POST['password'];
  $url = $_POST['url'];


  $updatedUser = User::update($fName, $lName, $email, $new, $url , $id);
 
 header("location: ../ManageUsers/index.php");
 
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


  <title>Administrador de lar | Editar utente</title>
  
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
                          <img class="h-10 w-10 rounded-full" src="<?= $_SESSION['photo']; ?>" alt="">
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
            <div>
              <legend>Editar utente</legend>
            </div>
            <div class="input-block">
              <label for="first-name">Primeiro nome</label>
                <input 
                  required
                  id="first-name" 
                  name="first-name"
                  value="<?= $user->get_first_name(); ?>"
                />
            </div>

            <div class="input-block">
              <label for="last-name">Ultimo nome</label>
                <input 
                  required
                  id="last-name" 
                  name="last-name"
                  autocomplete="off"
                  value="<?= $user->get_last_name(); ?>"
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
                  value="<?= $user->get_email(); ?>"
                />
            </div>

            <div class="input-block">
              <label for="password">Password</label>
                <input 
                  type="password"
                  id="password" 
                  name="password"
                  autocomplete="off"
                  value="<?= $user->get_password(); ?>"
                />
            </div>

            <div class="input-block">
              <label for="url">URL da foto</label>
                <input 
                  required
                  id="url" 
                  name="url"
                  autocomplete="off"
                  value="<?= $user->get_photo(); ?>"
                />
            </div>

           
          </fieldset>

        
          <button class="confirm-button" type="submit">
            Confirmar
          </button>
          <a href="" class="delete-button">
            Eliminar utente
          </a>
        </form>
    
</div>




</body>
</html>