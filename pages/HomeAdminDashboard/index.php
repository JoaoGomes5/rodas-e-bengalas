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


  <title>Admin | Dashboard</title>
  
</head>
<body>


  <div class="header-container fixed w-full z-10 top-0">
    <header class="header">
      <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
          <div class="flex justify-start lg:w-0 lg:flex-1">
            <a href="#">
              <span class="sr-only">Rodas e Bengalas</span>
              <img class="h-20" src="../../assets/images/icon.png" alt="">
            </a>
          </div>
        
          <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
            <a href="../AdminProfile" class="">

                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                        </div>

            </a>

            <a href="../../src/session/logout.php" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-10 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-red-500 hover:bg-red-600">
              Sair
            </a>
          </div>
          </div>
        </header>
  </div>

  <div class="content">
        <div class="title ">
            <h1>Dashboard</h1>

            <div>
              <button class="import">
                      <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0 0h24v24H0z" fill="none"/>
                          <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                      </svg>
                      <span class="ml-2">Importar informação</span>
                  
                  <input class="cursor-pointer absolute block opacity-0 pin-r pin-t" type="file" name="vacancyImageFiles"  >
                  </button>
            </div> 
        </div>

        <div class="options">

          <div class="option">
            <a href="../ManageUsers">
              <img src="../../assets/images/couple.png" alt="">

              <p>Utentes</p>
            </a>
          </div>

          <div class="option">
            <a href="../ClientLogin">
              <img src="../../assets/images/doctor.png" alt="">

              <p>Técnicos</p>
            </a>
          </div>

          <div class="option">
            <a href="../ClientLogin">
              <img src="../../assets/images/pills-bottle.png" alt="">

              <p>Medicamentos</p>
            </a>
          </div>

        </div>

       

  </div>

</body>
</html>