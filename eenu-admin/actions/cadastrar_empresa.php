<?php
include '../includes/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa_nome      = $_POST['empresa_nome'];
    $responsavel       = $_POST['responsavel'];
    $telefone          = $_POST['numero_empresa'];
    $torre             = $_POST['torre'];
    $andar             = $_POST['andar'];
    $numero_sala       = $_POST['numero_sala'];
    $descricao         = $_POST['descricao'];
    $cadastrante_nome  = $_POST['cadastrante_nome'];
    $cadastrante_img   = $_POST['cadastrante_imagem'];
    $data = date("Y-m-d H:i:s");

    $sql = "INSERT INTO empresas (
                data, empresa_nome, responsavel, cadastrante_nome, cadastrante_imagem,
                torre, andar, numero_sala, telefone, descricao
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssss",
        $data,
        $empresa_nome,
        $responsavel,
        $cadastrante_nome,
        $cadastrante_img,
        $torre,
        $andar,
        $numero_sala,
        $telefone,
        $descricao
    );

    if ($stmt->execute()) {
        header("Location: ../empresas.php");
        //exit;
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
