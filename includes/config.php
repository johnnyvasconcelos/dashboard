<?php
// Configuração do banco
$host = "localhost";
$user = "developerx";
$pass = "@tabledevelopment1";
$db   = "dashboard_eenu";

// Criando a conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verifica se deu certo
if ($conn->connect_error) {
    die("Erro na conexão com o banco: " . $conn->connect_error);
}

// Se quiser, pode remover depois (só para testar)
# echo "Conectado ao banco com sucesso!";
?>
