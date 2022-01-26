<?php
require_once(dirname(__FILE__, 3) . "/src/user/User.php");
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = md5($_POST['password']); 

  $user = User::get_by_email_and_password($email, $password);
  
  if ($user != null) { // Os dados inseridos são válidos
    if ($user->get_type() == 1) {
      
      session_start();
      $_SESSION['id'] = $user->get_id();
      $_SESSION['email'] = $user->get_email();
      $_SESSION['password'] = $user->get_password();
      $_SESSION['photo'] = $user->get_photo();
      $_SESSION['fName'] = $user->get_first_name();
      $_SESSION['lName'] = $user->get_last_name();
      
      
      header("location: ../HomeAdminDashboard/index.php");
    } else {
      header("location: index.php?err=2"); // Existe utilizador mas não tem permissões de Administrador
    }
  } else { // Não existe utilizador com os dados inseridos
    header("location: index.php?err=1");
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


  <title>Rodas e Bengalas</title>
</head>
<body>

  <a href="../LoginOptions">Voltar</a>

  <div class="container">
    <div class="content">

        <div class="form-container">
          <form action="" method="post">
            <h1>Login como administrador <br> de lar</h1>

            <input type="email" name="email" placeholder="E-mail" id="email">

            <input  type="password" name="password" placeholder="Password" id="password">

            <button type="submit">Entrar na plataforma</button>
          </form>
        </div>

    </div>

    <div class="background-container"> </div>

</div>
</body>
</html>