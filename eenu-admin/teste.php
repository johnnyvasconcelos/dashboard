<?php
$modelo = __DIR__ . "/empresas/pagina-empresa.php";
$novoArquivo = __DIR__ . "/empresas/copia-teste.php";

$conteudo = file_get_contents($modelo);

if ($conteudo === false) {
    die("Erro: não consegui ler o modelo.");
}

if (file_put_contents($novoArquivo, $conteudo) !== false) {
    echo "Arquivo clonado com sucesso!";
} else {
    die("Erro: não consegui salvar o novo arquivo.");
}
?>