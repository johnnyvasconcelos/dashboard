<?php
session_start();
require 'includes/config.php';
if (!isset($_SESSION['usuario_id']) && !isset($_COOKIE['usuario_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style/style.css" />
    <link rel="stylesheet" href="assets/style/form.css" />
    <script src="assets/scripts/vue.min.js"></script>
    <script src="assets/scripts/script.js" defer></script>
    <title>Editar Página - Dashboard EENU</title>
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
            <h1>Editar Página</h1>
            <form method="POST" action="actions/cadastrar_empresa.php">
              <div class="inputs">
                <div class="input">
              <label for="name">Nome Empresa</label>
              <input name="empresa_nome">
              </div>
              <div class="input">
              <label>Responsável</label>
              <input name="responsavel">
              </div>
              <div class="input">
              <label>Telefone</label>
              <input name="numero_empresa" type="number">
              </div>
              </div>

              <div class="inputs">
                <div class="input">
              <label for="name">Torre</label>
              <select name="torre">
                <option value="Torre 1">Torre 1</option>
                <option value="Torre 2">Torre 2</option>
              </select>
              </div>
              <div class="input">
              <label>Andar</label>
              <select name="andar">
                <option value="Térreo">Térreo</option>
                <option value="Andar 1">Andar 1</option>
                <option value="Andar 2">Andar 2</option>
                <option value="Andar 3">Andar 3</option>
              </select>
              </div>
              <div class="input">
              <label>N° Sala</label>
              <input name="numero_sala" type="number">
              </div>
              </div>
              <label>Descrição (opcional)</label>
              <textarea name="descricao"></textarea>
              <div style="display:none">
              <!-- cadastrante = usuário logado -->
              <input name="cadastrante_nome" value="<?php echo htmlspecialchars($row['nome']); ?>">
              <input name="cadastrante_imagem" value="<?php echo htmlspecialchars($row['foto']); ?>">
              <input name="data" value="">
              </div>
              <button type="submit"><span>cadastrar</span><img src="assets/images/plus.svg" alt="plus svg" /></button>
            </form>
            </div>      
            </div>
        </main>
      </div>
    </div>
  </div>
  </body>
</html>