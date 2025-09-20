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
    <title>Editar Site - Dashboard EENU</title>
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
            <h1>Editar Site</h1>
             <form method="POST" action="editar-empresa.php?id=<?php echo $id; ?>" enctype="multipart/form-data">



              <h3>informações gerais</h3>
              <div class="inputs">
                <div class="input">
                  <label for="titulo">Título</label>
                  <input type="text">
                </div>
                <div class="input">
                  <label for="email">E-mail</label>
                  <input type="text">
                </div>
                <div class="input">
                  <label for="whatsapp">Whatsapp</label>
                  <input type="text">
                </div>
              </div>
              <h3>sobre a empresa</h3>
                <div class="input">
                  <label for="sobre-1">Sobre a empresa</label>
                  <textarea name="sobre-1" id=""></textarea>
                </div>
                <div class="input">
                  <label for="input">Imagem sobre</label>
                  <input type="file" name="foto_sobre">
                  <img src="#" alt="img-sobre"/>
                </div>
                <div class="input">
                  <label for="sobre-1">Sobre a equipe</label>
                  <textarea name="sobre-3" id=""></textarea>
                </div>
                  -profissional_1_titulo
                  -profissional_2_titulo
                  -profissional_3_titulo
                  -profissional_1_texto
                  -profissional_2_texto
                  -profissional_3_texto
                  -profissional_1_imagem
                  -profissional_2_imagem
                  -profissional_3_imagem
              <h3>informações extras</h3>
                  -metodo_1_titulo
                  -metodo_1_texto
                  -metodo_2_titulo
                  -metodo_2_texto
                  -metodo_3_titulo
                  -metodo_3_texto
                  -metodo_4_titulo
                  -metodo_4_texto
              <h3>galeria</h3>
                  -foto_1
                  -foto_2
                  -foto_3
                  -foto_4
                  -foto_5
              <h3>sessão de ícones</h3>
                  -sobre_2
                  -icone_card_1
                  -icone_card_2
                  -icone_card_3
                  -titulo_card_1 
                  -titulo_card_2 
                  -titulo_card_3
                  -subtitulo_card_1
                  -subtitulo_card_2
                  -subtitulo_card_3
                 


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