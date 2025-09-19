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
    <link rel="stylesheet" href="assets/style/style.css" />
    <script src="assets/scripts/vue.min.js"></script>
    <script src="assets/scripts/script.js" defer></script>
  </head>
  <body>
    <div id="app">
    <div class="wrapper" :class="{ 'dark': darkMode }">
      <div class="main-container">
        <?php require 'includes/aside.php'; ?>
        <main>
          <?php require 'includes/header.php'; ?>
          <div class="main">
                          <div class="title" @click="menuMain()">
                <h1>Informações gerais</h1>
                <div class="caret">
                <img :src="darkMode ? 'assets/images/caret.svg' : 'assets/images/caret-dark.svg'" :style="{ transform: menuMainOpen ? 'rotate(-180deg)' : 'rotate(0)'}">
                </div>
              </div>
              <div class="area" :style="{ height: menuMainOpen ? 'auto' : '0px'}">
            <div class="header">
              <header>
                <img
                  :src="darkMode ? 'assets/images/globe-color.svg' : 'assets/images/globe-dark.svg'"
                  alt="globe"
                  class="globe"
                />
                <p class="p-site"><b>Site:</b> eenu.com.br</p>
                <a href="editar-site.php"
                  >Editar Site <img :src="darkMode ? 'assets/images/edit.svg' : 'assets/images/edit-dark.svg'" alt="edit"
                /></a>
              </header>
              <div class="info">
                <h2>Empresas Cadastradas</h2>
                <div class="icones">
                  <div class="icone">
                    <div class="img">
                    <img :src="darkMode ? 'assets/images/wallet-purple.svg' : 'assets/images/wallet-dark.svg'" alt="wallet" />
                    </div>
                    <div class="text">
                      <span>22</span>
                      <p>Empresas</p>
                      <p>Ativas no sistema</p>
                    </div>
                  </div>
                  <div class="icone">
                    <div class="img">
                    <img :src="darkMode ? 'assets/images/users-purple.svg' : 'assets/images/users-dark.svg'" alt="wallet" />
                    </div>
                    <div class="text">
                      <span>2</span>
                      <p>Usuários</p>
                      <p>Último login: 10/10</p>
                    </div>
                  </div>
                  <div class="icone">
                    <div class="img">
                    <img :src="darkMode ? 'assets/images/chart-purple.svg' : 'assets/images/chart-dark.svg'" alt="wallet" />
                    </div>
                    <div class="text">
                      <span>10/20</span>
                      <p>Salas Ocupadas</p>
                      <p>50% de ocupação</p>
                    </div>
                  </div>
                  <div class="icone">
                    <div class="img">
                    <img :src="darkMode ? 'assets/images/star-purple.svg' : 'assets/images/star-dark.svg'" alt="wallet" />
                    </div>
                    <div class="text">
                      <span>Impulse W...</span>
                      <p>Última Empresa</p>
                      <p>Responsável: Ricardo Faria</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-container">
           <table>
    <tr>
      <th>Data</th>
      <th>Empresa</th>
      <th>Responsável</th>
      <th>Cadastrante</th>
    </tr>

    <?php
    $sql = "SELECT * FROM empresas ORDER BY data DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $linha = 0;
        while ($row = $result->fetch_assoc()) {
            $linha++;
            $classe = ($linha % 2 == 0) ? "par" : "impar";
            $vShow = ($linha <= 4) ? "" : "v-show=\"expanded\"";
            echo "<tr class='$classe' $vShow>";
            echo "<td>" . date('d/m', strtotime($row['data'])) . "</td>";
            echo "<td>" . htmlspecialchars($row['empresa_nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['responsavel']) . "</td>";
            echo "<td><img src='assets/images/" . htmlspecialchars($row['cadastrante_imagem']) . "' alt='user' />" 
                 . htmlspecialchars($row['cadastrante_nome']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhuma empresa cadastrada.</td></tr>";
    }
    ?>
  </table>
  </div>
            <footer>
              <div class="btns">
                <div class="btn ver-mais" @click="toggleExpanded">{{ expanded ? "ver menos" : "ver mais" }}</div>
                <a href="cadastrar-empresa.php" class="btn non"
                  >cadastrar empresa
                  <img src="assets/images/plus.svg" alt="plus"
                /></a>
              </div>
            </footer>
          </div>
          </div>
        </main>
      </div>
    </div>
  </div>
  </body>
</html>