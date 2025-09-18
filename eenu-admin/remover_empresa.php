<?php
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM empresas WHERE id = $id";

    if ($conn->query($sql)) {
        echo "Empresa removida com sucesso.";
    } else {
        echo "ERRO: " . $conn->error;
    }
} else {
    echo "ERRO: Requisição inválida";
}
