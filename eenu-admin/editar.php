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
              <div class="input">
                <img src="#" alt="cabeçalho imagem"/>
                <label for="cabecalho">Imagem de Cabeçalho</label>
                <input type="file" name="foto_cabecalho">
              </div>
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
                <div class="inputs">
              <div class="input">
                <img src="#"/>
                <input type="file" name="profissional_1_imagem">
                <label for="profissional_1_titulo">1 Profissional</label>
                <input type="text" name="profissional_1_titulo">
                <input type="text" name="profissional_1_texto">
              </div>
              <div class="input">
                <img src="#"/>
                <input type="file" name="profissional_2_imagem">
                <label for="profissional_2_titulo">1 Profissional</label>
                <input type="text" name="profissional_2_titulo">
                <input type="text" name="profissional_2_texto">
              </div>
              <div class="input">
                <img src="#"/>
                <input type="file" name="profissional_3_imagem">
                <label for="profissional_3_titulo">1 Profissional</label>
                <input type="text" name="profissional_3_titulo">
                <input type="text" name="profissional_3_texto">
              </div>
              </div>
              <h3>informações extras</h3>
              
              <h3>galeria</h3>
              <div class="inputs">
                <div class="input">
                  <label for="foto_1">
                    <p>Foto 1</p>
                    <img src="#" alt="foto_1"/>
                    <input type="file">
                  </label>
                </div>
                <div class="input">
                  <label for="foto_2">
                    <p>Foto 2</p>
                    <img src="#" alt="foto_2"/>
                    <input type="file">
                  </label>
                </div>
                <div class="input">
                  <label for="foto_3">
                    <p>Foto 3</p>
                    <img src="#" alt="foto_3"/>
                    <input type="file">
                  </label>
                </div>
                <div class="input">
                  <label for="foto_4">
                    <p>Foto 4</p>
                    <img src="#" alt="foto_4"/>
                    <input type="file">
                  </label>
                </div>
                <div class="input">
                  <label for="foto_5">
                    <p>Foto 5</p>
                    <img src="#" alt="foto_5"/>
                    <input type="file">
                  </label>
                </div>
              </div>
              <h3>sessão de cards</h3>
              <div class="inputs">
                <div class="input">
                  <label for="">Card 1</label>
                  <input type="text" name="metodo_1_titulo">
                  <input type="text" name="metodo_1_texto">
                </div>
                <div class="input">
                  <label for="">Card 2</label>
                  <input type="text" name="metodo_2_titulo">
                  <input type="text" name="metodo_2_texto">
                </div>
                <div class="input">
                  <label for="">Card 3</label>
                  <input type="text" name="metodo_3_titulo">
                  <input type="text" name="metodo_3_texto">
                </div>
                <div class="input">
                  <label for="">Card 4</label>
                  <input type="text" name="metodo_4_titulo">
                  <input type="text" name="metodo_4_texto">
                </div>
              </div>
              <h3>sessão de ícones</h3>
              <div class="input">
                <label for="sobre_2">Mais sobre a empresa</label>
                <textarea name="sobre_2" id=""></textarea>
              </div>
              <div class="inputs">
    <!-- Input 1 -->
    <div class="input">
      <img :src="card1.icon" alt="" width="50">
      <label>Ícone 1</label>
      <a href="#" class="btn-icones" @click.prevent="openModal('card1')">selecionar ícone</a>
      <input type="text" name="icone_card_1" v-model="card1.icon" style="display:none">
      <input type="text" name="titulo_card_1" v-model="card1.title">
      <input type="text" name="subtitulo_card_1" v-model="card1.subtitle">
    </div>

    <!-- Input 2 -->
    <div class="input">
      <img :src="card2.icon" alt="" width="50">
      <label>Ícone 2</label>
      <a href="#" class="btn-icones" @click.prevent="openModal('card2')">selecionar ícone</a>
      <input type="text" name="icone_card_2" v-model="card2.icon" style="display:none">
      <input type="text" name="titulo_card_2" v-model="card2.title">
      <input type="text" name="subtitulo_card_2" v-model="card2.subtitle">
    </div>

    <!-- Input 3 -->
    <div class="input">
      <img :src="card3.icon" alt="" width="50">
      <label>Ícone 3</label>
      <a href="#" class="btn-icones" @click.prevent="openModal('card3')">selecionar ícone</a>
      <input type="text" name="icone_card_3" v-model="card3.icon" style="display:none">
      <input type="text" name="titulo_card_3" v-model="card3.title">
      <input type="text" name="subtitulo_card_3" v-model="card3.subtitle">
    </div>
</div>

     <div v-cloak v-if="showModal" class="modal">
    <div class="modal-content">
      <h3>Selecione um ícone</h3>
      <div class="icons-grid">
        <img 
          v-for="(icon, i) in icons" 
          :key="i" 
          :src="icon" 
          width="40"
          @click="selectIcon(icon)"
          style="cursor:pointer; margin:5px"
        >
      </div>
      <button @click="closeModal">Fechar</button>
    </div>
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