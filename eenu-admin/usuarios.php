<?php
session_start();
require 'includes/config.php';
if (!isset($_SESSION['usuario_id']) && !isset($_COOKIE['usuario_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modelo Dashboard EENU</title>
    <link rel="stylesheet" href="./assets/style/style.css" />
    <link rel="icon" href="assets/images/favicon.webp" type="image/x-icon">
    <script src="./assets/scripts/vue.min.js"></script>
    <script src="./assets/scripts/script.js" defer></script>
  </head>
  <body>
        <div id="app">
    <div class="wrapper" :class="{ 'dark': darkMode }">
      <div class="main-container">
        <?php require 'includes/aside.php'; ?>
        <main>
          <?php require 'includes/header.php'; ?>
            <div class="main">
                         
            
            </div>
        </main>
      </div>
    </div>
  </div>
  </body>
</html>