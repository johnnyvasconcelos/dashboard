<?php
session_start();
require 'includes/config.php'; // conexão $conn

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conn->real_escape_string($_POST['nome']);
    $senha = $_POST['senha'];

    $result = $conn->query("SELECT * FROM usuarios WHERE nome = '$nome' LIMIT 1");
    if ($result && $row = $result->fetch_assoc()) {
        if ($senha === $row['senha']) { // senha simples apenas para teste
            $_SESSION['usuario_id'] = $row['id'];

            // lembrar-me opcional
            if (isset($_POST['lembrar'])) {
                setcookie('usuario_id', $row['id'], time() + 86400*30, "/"); // 30 dias
            }

            header('Location: index.php'); // redireciona para painel
            exit;
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Usuário não encontrado!";
    }
}
?>


    <?php if ($erro) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST" action="">
        <label>Usuário:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <label><input type="checkbox" name="lembrar"> Lembrar-me</label><br><br>

        <button type="submit">Entrar</button>
    </form>

