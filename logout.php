<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /github-@proyects/php-login-simple');
?>
