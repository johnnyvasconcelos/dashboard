<?php
session_start();
require 'includes/config.php';

if (isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}

if (isset($_COOKIE['usuario_id'])) {
    $_SESSION['usuario_id'] = $_COOKIE['usuario_id'];
    header('Location: index.php');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conn->real_escape_string($_POST['nome']);
    $senha = $_POST['senha'];

    $result = $conn->query("SELECT * FROM usuarios WHERE nome = '$nome' LIMIT 1");
    if ($result && $row = $result->fetch_assoc()) {
        if ($senha === $row['senha']) {
            $_SESSION['usuario_id'] = $row['id'];

            if (isset($_POST['lembrar'])) {
                setcookie('usuario_id', $row['id'], time() + 86400*30, "/");
            }

            header('Location: index.php');
            exit;
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Usuário não encontrado!";
    }
}
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/style/login.css">
        <link rel="stylesheet" href="assets/style/style.css" />
        <link rel="icon" href="assets/images/favicon.webp" type="image/x-icon">
        <script src="./assets/scripts/vue.min.js"></script>
        <script src="./assets/scripts/script.js" defer></script>
        <title>Login - Eenu</title>
    </head>
    <body>
        <div id="app">
        <div class="wrapper" :class="{ 'dark': darkMode }">
            <form method="POST" action="" class="login">
                <?php if ($erro) echo "<p style='color:var(--red); font-size: 18px; text-align: center;'>$erro</p>"; ?>
                <div class="title-form">
                    <img :src="darkMode ? './assets/images/logo.png' : './assets/images/logo-normal.png'" class="logo" alt="logo"/>
                    <div class="span">EENU</div>
                </div><br>
                <div class="input-area">
                <img :src="darkMode ? './assets/images/usuario-rosa.svg' : './assets/images/usuario-cinza.svg'" alt="user"><input type="text" name="nome" placeholder="Usuário" required>
                </div><br>
                <div class="input-area">
                <img :src="darkMode ? './assets/images/cadeado-rosa.svg' : './assets/images/cadeado-cinza.svg'" alt="password"><input :type="showPassword ? 'text' : 'password'" name="senha" placeholder="Senha" required>
                <img :src="darkMode ? './assets/images/olho-rosa.svg' : './assets/images/olho-cinza.svg'" alt="eye" class="eye" @click="showPassword = !showPassword">
                <br><br>
                </div><br>
                <label style="cursor: pointer"><input type="checkbox" name="lembrar" style="cursor: pointer"> &nbsp;Lembrar-me</label><br><br>
                <button type="submit">Entrar</button>
            </form>
        </div>
        </div>
    </body>
    </html>


