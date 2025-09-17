<?php
session_start();
require 'includes/config.php';

$usuario_id = $_SESSION['usuario_id'] ?? $_COOKIE['usuario_id'] ?? null;

if (!$usuario_id) {
    // Se não estiver logado, redireciona para login
    header('Location: login.php');
    exit;
}

$result = $conn->query("SELECT nome FROM usuarios WHERE id = $usuario_id LIMIT 1");
$row = $result->fetch_assoc();
$nome = htmlspecialchars($row['nome'] ?? 'Visitante');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $nome; ?>!</h1>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
