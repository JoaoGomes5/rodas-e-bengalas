<?php
require_once(dirname(__FILE__, 3) . "/src/user/User.php");
require_once(dirname(__FILE__, 3) . "/src//database/connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = md5($_POST['password']); 

  $user = User::get_by_email_and_password($email, $password);

  if ($user != null) { // Os dados inseridos são válidos
    if ($user->get_type() == 0) {
      session_start();
      $_SESSION['user'] = $user;
      
      header("location: ../AdminDashboard/index.php");
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
  
  

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.png">
  <link rel="stylesheet" href="./styles.css">

  <title>Rodas e Bengalas</title>
</head>
<body>
<a href="../LoginOptions">Voltar</a>
  <div class="container">

    <div class="background-container"> </div>

    <div class="content">

        <div class="form-container">
          <form action="" method="post">
            <h1>Login como administrador</h1>

            <input type="email" name="email" placeholder="E-mail" id="email">

            <input  type="password" name="password" placeholder="Password" id="password">

            <button type="submit">Entrar na plataforma</button>
          </form>
        </div>

      </div>
  </div>
</body>
</html>