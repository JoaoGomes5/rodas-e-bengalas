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
            <a href="#" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-10 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white ">
              Sair
            </a>
          </div>
          </div>
        </header>
  </div>

  <div class="content">
        <div class="title ">
            <h1>Lista de lares</h1>

            <div class="buttons-container">
              <a href="#" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-10 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700">
                Estatisticas
              </a>

              <a href="#" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-10 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-400 hover:bg-blue-500">
                Criar novo
              </a>
            </div>
        </div>

       
        <div class="home-list">

        

          <ul >
            <li class="home">
              <a href="../HomeDetails?id=0">
                  <div class="home-info">
                      <h1>Lar de Espinho</h1>

                      <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                      </p>
                  </div>
                  <div>

                    <img src="../../assets/images/sea.png" alt="">
                  </div>
              </a>
            </li>

            <li class="home">
              <a href="../HomeDetails?id=0">
                  <div class="home-info">
                      <h1>Lar de Espinho</h1>

                      <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                      </p>
                  </div>
                  <div>

                    <img src="../../assets/images/sea.png" alt="">
                  </div>
              </a>
            </li>

            <li class="home">
              <a href="../HomeDetails?id=0">
                  <div class="home-info">
                      <h1>Lar de Espinho</h1>

                      <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                      </p>
                  </div>
                  <div>

                    <img src="../../assets/images/sea.png" alt="">
                  </div>
              </a>
            </li>

            <li class="home">
              <a href="../HomeDetails?id=0">
                  <div class="home-info">
                      <h1>Lar de Espinho</h1>

                      <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                      </p>
                  </div>
                  <div>

                    <img src="../../assets/images/sea.png" alt="">
                  </div>
              </a>
            

          </ul>

        </div>

       

  </div>

</body>
</html>