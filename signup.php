<?php

  require 'database.php';

  $message = '';

  /*
    * @ empty($email) : función que indica si una variables está vacía. Es true si está vacía. 
    * ->prepare($sql) : función que permite declarar una sentencia sql.
    * ->bindParam(:,$) : funcion que relaciona una variable con un valor enviado a través de un formulario para validar una consulta.
    * password_hash($,PASSWORD_BCRYPT) :  Función de php que sirve para encriptar datos.
    * ->excute() : funcion que ejecuta una sentencia sql preparada. devuelve un booleano true si 
      la consulta se realizó con exito.
  */
  
  if (isset($_POST['email'])){
    $message = "Se produjo un error al momento de crear una cuenta...";
  }

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);  
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Correcto, se creo un nuevo usuario';
    } else {
      $message = 'Se produjo un error al momento de crear una cuenta';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
