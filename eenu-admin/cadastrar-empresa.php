<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style/style.css" />
    <link rel="stylesheet" href="assets/style/form.css" />
    <script src="assets/scripts/vue.min.js"></script>
    <script src="assets/scripts/script.js" defer></script>
    <title>Cadastrar Empresa - Dashboard EENU</title>
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
            <h1>Cadastrar Empresa</h1>
            <form>
              <div class="inputs">
                <div class="input">
              <label for="name">Nome Empresa</label>
              <input>
              </div>
              <div class="input">
              <label>Responsável</label>
              <input>
              </div>
              <div class="input">
              <label>Telefone</label>
              <input type="number">
              </div>
              </div>

              <div class="inputs">
                <div class="input">
              <label for="name">Torre</label>
              <select>
                <option>Torre 1</option>
                <option>Torre 2</option>
              </select>
              </div>
              <div class="input">
              <label>Andar</label>
              <select>
                <option>Térreo</option>
                <option>Andar 1</option>
                <option>Andar 2</option>
                <option>Andar 3</option>
              </select>
              </div>
              <div class="input">
              <label>N° Sala</label>
              <input type="number">
              </div>
              </div>

              <label>Descrição (opcional)</label>
              <textarea name="" id=""></textarea>
              <div style="display:none">
              <!-- cadastrante = usuário logado -->
              <input value="user">
              </div>
              <button type="submit"><span>cadastrar</span><img src="assets/images/plus.svg" alt="plus svg" /></button>
            </form>
</div>
telefone
email
            
            </div>
        </main>
      </div>
    </div>
  </div>
  </body>
</html>