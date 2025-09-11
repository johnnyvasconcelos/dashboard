<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modelo Dashboard EENU</title>
    <link rel="stylesheet" href="./assets/style/style.css" />
    <script src="./assets/scripts/script.js" defer></script>
    <script src="./assets/scripts/index.js" defer></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="main-container">
        <?php require 'includes/aside.php'; ?>
        <main>
          <?php require 'includes/header.php'; ?>
          <div class="main">
            <div class="header">
              <header>
                <img
                  src="./assets/images/globe-color.svg"
                  alt="globe"
                  class="globe"
                />
                <p><b>Site:</b> www.eenu.com.br</p>
                <a href="#"
                  >Editar Site <img src="./assets/images/edit.svg" alt="edit"
                /></a>
              </header>
              <div class="info">
                <h2>Empresas Cadastradas</h2>
                <div class="icones">
                  <div class="icone">
                    <img src="./assets/images/wallet-color.svg" alt="wallet" />
                    <div class="text">
                      <span>22</span>
                      <p>Empresas</p>
                    </div>
                  </div>
                  <div class="icone">
                    <img src="./assets/images/users-color.svg" alt="wallet" />
                    <div class="text">
                      <span>2</span>
                      <p>Usuários</p>
                    </div>
                  </div>
                  <div class="icone">
                    <img src="./assets/images/chart-color.svg" alt="wallet" />
                    <div class="text">
                      <span>10/20</span>
                      <p>Salas Ocupadas</p>
                    </div>
                  </div>
                  <div class="icone">
                    <img src="./assets/images/star-color.svg" alt="wallet" />
                    <div class="text">
                      <span>Impulse W...</span>
                      <p>Última Empresa</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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

            echo "<tr class='$classe'>";
            echo "<td>" . date('d/m', strtotime($row['data'])) . "</td>";
            echo "<td>" . htmlspecialchars($row['empresa_nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['responsavel']) . "</td>";
            echo "<td><img src='" . htmlspecialchars($row['cadastrante_imagem']) . "' alt='user' />" 
                 . htmlspecialchars($row['cadastrante_nome']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhuma empresa cadastrada.</td></tr>";
    }
    ?>
  </table>
            <footer>
              <div class="btns">
                <div class="btn ver-mais">ver mais</div>
                <a href="./cadastrar-empresa.php" class="btn"
                  >cadastrar empresa
                  <img src="./assets/images/plus.svg" alt="plus"
                /></a>
              </div>
            </footer>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
