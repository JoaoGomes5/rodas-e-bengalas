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


  <title>Administrador de lar | Técnicos </title>
  
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

            <a href="../../src/session/logout.php" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-10 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white ">
              Sair
            </a>
          </div>
          </div>
        </header>
  </div>

  <div class="content">
        <div class="title">
            <h1>Medicamentos</h1>

            <div class="buttons-container">
              <a href="../NewTechnicians" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-10 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-400 hover:bg-blue-500">
                Registar técnico
              </a>
            </div>
        </div>

       
        <div class="users">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Nome
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Inicio da toma
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Fim da toma
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      Jane Cooper
                    </div>
                    <div class="text-sm text-gray-500">
                      jane.cooper@example.com
                    </div>
                  </div>
                </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">10 de Janeiro</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">20 de Fevereiro</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap ">
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-600 text-white">
                          SOS
                      </span>
                    </td>
                    <td class="px-6 py-4 edit ">
                      <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          
        </div>
        </div>

          
       

  </div>

</body>
</html>