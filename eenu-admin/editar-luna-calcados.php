<?php
require './includes/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style/style.css" />
    <link rel="stylesheet" href="assets/style/form.css" />
    <link rel="icon" href="assets/images/favicon.webp" type="image/x-icon">
    <script src="assets/scripts/vue.min.js"></script>
    <script src="assets/scripts/script.js" defer></script>
    <title>Editar Empresa - Dashboard EENU</title>
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
            <h1>Editar Empresa</h1>
             <form method="POST" action="editar-empresa.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <div class="inputs">
      <div class="input">
        <label for="name">Nome Empresa</label>
        <input type="text" name="empresa_nome" value="<?php echo htmlspecialchars($empresa['empresa_nome']); ?>" required>
      </div>
      <div class="input">
        <label>Responsável</label>
        <input name="responsavel" value="<?php echo htmlspecialchars($empresa['responsavel']); ?>">
      </div>
      <div class="input">
        <label>Telefone</label>
        <input name="telefone" type="tel" 
       value="<?php echo htmlspecialchars($empresa['telefone'] ?? ''); ?>" 
       required>
      </div>
    </div>

    <div class="inputs">
      <div class="input">
        <label for="name">Torre</label>
        <select name="torre">
          <option value="Torre 1" <?php echo ($empresa['torre'] == 'Torre 1') ? 'selected' : ''; ?>>Torre 1</option>
          <option value="Torre 2" <?php echo ($empresa['torre'] == 'Torre 2') ? 'selected' : ''; ?>>Torre 2</option>
        </select>
      </div>
      <div class="input">
        <label>Andar</label>
        <select name="andar">
          <option value="Térreo" <?php echo ($empresa['andar'] == 'Térreo') ? 'selected' : ''; ?>>Térreo</option>
          <option value="Andar 1" <?php echo ($empresa['andar'] == 'Andar 1') ? 'selected' : ''; ?>>Andar 1</option>
          <option value="Andar 2" <?php echo ($empresa['andar'] == 'Andar 2') ? 'selected' : ''; ?>>Andar 2</option>
          <option value="Andar 3" <?php echo ($empresa['andar'] == 'Andar 3') ? 'selected' : ''; ?>>Andar 3</option>
        </select>
      </div>
      <div class="input">
        <label>N° Sala</label>
        <input name="numero_sala" type="number" value="<?php echo htmlspecialchars($empresa['numero_sala']); ?>">
      </div>
    </div>

    <label>Descrição (opcional)</label>
    <textarea name="descricao" required><?php echo htmlspecialchars($empresa['descricao']); ?></textarea>

    <div style="display:none">
      <!-- cadastrante = usuário logado -->
      <input name="cadastrante_nome" value="<?php echo htmlspecialchars($empresa['cadastrante_nome']); ?>">
      <input name="cadastrante_imagem" value="<?php echo htmlspecialchars($empresa['cadastrante_imagem']); ?>">
      <input name="data" value="">
    </div>

    <button type="submit" name="atualizar">
      <span>Salvar</span>
      <img src="assets/images/save.svg" alt="save svg" />
    </button>
  </form>
            </div>      
            </div>
        </main>
      </div>
    </div>
  </div>
  </body>
</html>