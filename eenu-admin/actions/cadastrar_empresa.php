<?php
include '../includes/config.php';

function formatarNomeArquivo($nome) {
    $nome = iconv('UTF-8', 'ASCII//TRANSLIT', $nome);
    $nome = strtolower($nome);
    $nome = preg_replace('/[^a-z0-9\s-]/', '', $nome);
    $nome = preg_replace('/\s+/', '-', $nome);
    $nome = preg_replace('/-+/', '-', $nome);
    $nome = trim($nome, '-');
    return $nome;
}

function criarArquivoEmpresa($nomeEmpresa, $dadosEmpresa) {
    $nomeArquivo = formatarNomeArquivo($nomeEmpresa);
    $caminhoArquivo = "../../empresa/{$nomeArquivo}.php";
    $templatePath = "../../empresa/pagina-empresa.php";
    if (!file_exists($templatePath)) {
        throw new Exception("Template pagina-empresa.php não encontrado!");
    }
    $conteudoTemplate = file_get_contents($templatePath);
    $conteudoFinal = str_replace([
        '{{NOME_EMPRESA}}',
        '{{RESPONSAVEL}}',
        '{{TELEFONE}}',
        '{{TORRE}}',
        '{{ANDAR}}',
        '{{NUMERO_SALA}}',
        '{{DESCRICAO}}',
        '{{SLUG}}'
    ], [
        $dadosEmpresa['empresa_nome'],
        $dadosEmpresa['responsavel'],
        $dadosEmpresa['telefone'],
        $dadosEmpresa['torre'],
        $dadosEmpresa['slug'],
        $dadosEmpresa['andar'],
        $dadosEmpresa['numero_sala'],
        $dadosEmpresa['descricao']
    ], $conteudoTemplate);
    if (file_put_contents($caminhoArquivo, $conteudoFinal) === false) {
        throw new Exception("Erro ao criar o arquivo da empresa!");
    }
    return $nomeArquivo . '.php';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa_nome      = $_POST['empresa_nome'];
    $responsavel       = $_POST['responsavel'];
    $telefone          = $_POST['numero_empresa'];
    $torre             = $_POST['torre'];
    $andar             = $_POST['andar'];
    $slug            = $_POST['slug'];
    $numero_sala       = $_POST['numero_sala'];
    $descricao         = $_POST['descricao'];
    $cadastrante_nome  = $_POST['cadastrante_nome'];
    $cadastrante_img   = $_POST['cadastrante_imagem'];
    $data = date("Y-m-d H:i:s");

    $sql = "INSERT INTO empresas (
                data, empresa_nome, responsavel, cadastrante_nome, cadastrante_imagem,
                torre, andar, numero_sala, telefone, descricao, slug
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssss",
        $data,
        $empresa_nome,
        $responsavel,
        $cadastrante_nome,
        $cadastrante_img,
        $torre,
        $andar,
        $numero_sala,
        $telefone,
        $descricao,
        $slug
    );

    if ($stmt->execute()) {
        $sql_site = "INSERT INTO empresas_sites (nome, slug) VALUES (?, ?)";
        $stmt_site = $conn->prepare($sql_site);
        $stmt_site->bind_param("ss", $empresa_nome, $slug);
        $stmt_site->execute();
        $stmt_site->close();

        try {
            $dadosEmpresa = [
                'empresa_nome' => $empresa_nome,
                'responsavel' => $responsavel,
                'telefone' => $telefone,
                'torre' => $torre,
                'andar' => $andar,
                'numero_sala' => $numero_sala,
                'descricao' => $descricao,
                'slug' => $slug
            ];
            $nomeArquivoCriado = criarArquivoEmpresa($empresa_nome, $dadosEmpresa);
            
            echo "Empresa cadastrada com sucesso! Arquivo criado: " . $nomeArquivoCriado;
            header("Location: ../../eenu-admin/empresas.php");
            exit;
        } catch (Exception $e) {
            echo "Empresa cadastrada, mas erro ao criar arquivo: " . $e->getMessage();
        }
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
