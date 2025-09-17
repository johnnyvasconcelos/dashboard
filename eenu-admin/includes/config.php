<?php
$host = "localhost";
$user = "developerx";
$pass = "@tabledevelopment1";
$db   = "dashboard_eenu";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erro na conexão com o banco: " . $conn->connect_error);
}
?>
