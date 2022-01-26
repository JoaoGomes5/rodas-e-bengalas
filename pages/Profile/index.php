<?php
require_once(dirname(__FILE__, 3) . "/src/user/User.php");
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

session_start();

$id = $_SESSION['id'];

$user = User::get_by_id($id);

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $fName = $_POST['first-name'];
  $lName = $_POST['last-name'];
  $email = $_POST['email'];
  $current = $_POST['current'];
  $new = $_POST['new'];
  $url = $_POST['url'];

 
 
  $updatedUser = User::update($fName, $lName, $email, $new, $url , $id);
  
  $user = User::get_by_id($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.png">
  <script src="https://cdn.tailwindcss.com"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="./index.js"></script>
  <link rel="stylesheet" href="./styles.css">

  <title>Admin | Dashboard</title>
  
</head>
<body>


  <div class="header-container fixed w-full z-10 top-0">
    <header class="header">
      
      <a href="<?php 
          if($user->get_type() == 0){
            echo "../AdminDashboard";
          }

          if($user->get_type() == 1){
            echo "../HomeAdminDashboard";
          }
      ?>" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#FFF">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
      </a>

                <div class="relative inline-block">
                  <img class="rounded-full profile object-fill" src="<?= $user->get_photo(); ?>" alt="">
                  
                </div>
        
      
    
    </header>
  </div>

  <div class="content">
  <form action="" class="create-orphanage-form" method="post">
          <fieldset>
            <legend>Meus dados</legend>
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
              <label for="current">Password atual</label>
                <input 
                  type="password"
                  id="current" 
                  name="current"
                  autocomplete="off"
                />
            </div>

            <div class="input-block">
            <label for="new">Password nova</label>
                <input 
                  type="password"
                  id="new" 
                  name="new"
                  autocomplete="off"
                />
            </div>

            <div class="input-block">
            <label for="new">Url da foto</label>
                <input 
                  type=""
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
        </form>
  </div>


  
  
  




 <div class="fixed z-10 inset-0 overflow-y-auto modal" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="delete-modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Atenção
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  Pertende mudar a foto de perfil?
                </p>
                <div class="relative text-gray-600 focus-within:text-blue-400 input">
                  <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
      </svg>
                    
                  </span>
                  <input type="text" name="url" id="url" class="py-2 text-sm text-black rounded-md pl-10" placeholder="Nova url" autocomplete="off" required>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <a href="" id="yes" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
            Sim
</a>
          <button id="no" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Não
          </button>
        </div>
      </div>
    </div>
</div> 
</body>
</html>