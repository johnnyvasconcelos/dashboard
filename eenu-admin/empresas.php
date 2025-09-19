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
    <link rel="stylesheet" href="assets/style/table.css" />
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
              <div class="form-area">
            <h1>Empresas Cadastradas</h1>
</div>
              <div class="table-container">
                          <table class="alt-table">
    <tr>
      <th>Empresa</th>
      <th>Responsável</th>
      <th>Torre</th>
      <th>Andar</th>
      <th>N° Sala</th>
    </tr>

    <?php
    $sql = "SELECT * FROM empresas ORDER BY data DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $linha = 0;
        while ($row = $result->fetch_assoc()) {
            $linha++;
            $classe = ($linha % 2 == 0) ? "par" : "impar";
            $vShow = ($linha <= 114) ? "" : "v-show=\"expanded\"";
            echo "<tr class='$classe' $vShow @click=\"abrirModal({
          id: '" . $row['id'] . "',
          empresa_nome: '" . htmlspecialchars($row['empresa_nome']) . "',
          data: '" . htmlspecialchars($row['data']) . "',
          descricao: '" . htmlspecialchars($row['descricao']) . "',
          telefone: '" . htmlspecialchars($row['telefone']) . "',
          cadastrante: '" . htmlspecialchars($row['cadastrante_nome']) . "',
          cadastrante_imagem: '" . htmlspecialchars($row['cadastrante_imagem']) . "'
        })\">";
            echo "<td>" . htmlspecialchars($row['empresa_nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['responsavel']) . "</td>";
            echo "<td>" . htmlspecialchars($row['torre']) . "</td>";
            echo "<td>" . htmlspecialchars($row['andar']) . "</td>";
            echo "<td>" . htmlspecialchars($row['numero_sala']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhuma empresa cadastrada.</td></tr>";
    }
    ?>
  </table>
  </div>
            </div>
        </main>
        <!-- Modal -->
<div class="modal modal-table" v-cloak v-if="modalAberto" @click="modalAberto = false">
  <div class="modal-content" @click.stop>
    <span class="close" @click="modalAberto = false"><span>&times;</span></span>
    <h2>{{ empresaSelecionada.empresa_nome }}</h2>
    <p><strong>Página:</strong> <a href="empresas/pagina-empresa.php">
 {{ `${slugify(empresaSelecionada.empresa_nome)}.php` }}
</a><br>
  <!-- 
    <a :href="`${window.location.origin}/empresa/${slugify(empresaSelecionada.empresa_nome)}.php`">
  {{ `${window.location.origin}/empresa/${slugify(empresaSelecionada.empresa_nome)}.php` }}
</a>
 -->
<div class="flex">
<a href="editar-pagina.php" class="edit-btn">Editar página <img src="assets/images/edit-dark.svg" alt="Edit"></a>
</div>
</p>
    <p><strong>Descrição:</strong> {{ empresaSelecionada.descricao }}</p>
    <p><img class="phone" src="assets/images/phone.svg" alt="Edit"> <strong>Telefone:</strong> {{ empresaSelecionada.telefone }}</p>
    <p><strong>Cadastrante:</strong> {{ empresaSelecionada.cadastrante }}</p>
    <p><strong>Cadastro:</strong> {{ empresaSelecionada.data }}</p>
    <div class="modal-btns">
    <a class="btn-edit btn" :href="'editar-empresa.php?id=' + empresaSelecionada.id">
    <img src="assets/images/edit-dark.svg" alt="Edit">
  Editar
</a>
    <button class="btn-trash btn" @click="removerEmpresa(empresaSelecionada.id)">
      <img src="assets/images/trash.svg" alt="Remover">
      Remover
    </button>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
  </body>
</html>