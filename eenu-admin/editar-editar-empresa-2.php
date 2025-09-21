<?php
session_start();
require 'includes/config.php';
if (!isset($_SESSION['usuario_id']) && !isset($_COOKIE['usuario_id'])) {
    header('Location: login.php');
    exit;
}
$arquivo = basename($_SERVER['PHP_SELF']);
$slug = str_replace(['editar-', '.php'], '', $arquivo);
$sql = "SELECT * FROM empresas_sites WHERE slug = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$empresa = $result->fetch_assoc();
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
             <form method="POST" class="editar-empresa" action="editar-empresa.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
              <h3>informações gerais</h3>
              <div class="inputs inputs-1">
              <div class="input input-image">
                <label class="label-img" for="foto_cabecalho"><img src="../empresa/assets/images/<?php echo $empresa['foto_cabecalho']; ?>" alt="cabeçalho imagem"/></label>
                <input type="file" name="foto_cabecalho">
              </div>
               <div class="inputs-column">
                <div class="input">
                  <label for="titulo">Título</label>
                  <input type="text" name="titulo" value="<?php echo $empresa['titulo']; ?>">
                </div>
                <div class="input">
                  <label for="email">E-mail</label>
                  <input type="text" name="email" value="<?php echo $empresa['email']; ?>">
                </div>
                <div class="input">
                  <label for="whatsapp">Whatsapp</label>
                  <input type="text" name="whatsapp" value="<?php echo $empresa['whatsapp']; ?>">
                </div>
              </div>
              </div>
              <br><h3>sobre a empresa</h3>
              <div class="inputs inputs-2">
                <div class="input">
                  <label for="sobre_1">Sobre a empresa</label>
                  <textarea name="sobre_1" id=""><?php echo $empresa['sobre_1'] ?? 'Mais informações sobre a empresa. Edite no painel.'; ?></textarea>
                </div>
                <div class="input">
                  <label for="input">Imagem sobre</label>
                  <img src="../empresa/assets/images/<?php echo $empresa['foto_sobre']; ?>" alt="img-sobre"/>
                  <input type="file" name="foto_sobre" value="">
                </div>
                </div>
              <div class="input input-100">
                <label for="sobre_3">Sobre a equipe</label>
                <textarea name="sobre_3" id=""><?php echo $empresa['sobre_3'] ?? 'Sobre a nossa equipe. Edite no painel.'; ?></textarea>
              </div>
              <div class="inputs inputs-3">
              <div class="input">
                <label for="profissional_1_titulo">Profissional 1</label>
                <img src="../empresa/assets/images/<?php echo $empresa['profissional_1_imagem']; ?>" alt="profissional"/>
                <input type="file" name="profissional_1_imagem">
                <input type="text" name="profissional_1_titulo" value="<?php echo $empresa['profissional_1_titulo']; ?>">
                <textarea type="text" name="profissional_1_texto"><?php echo $empresa['profissional_1_texto'] ?? 'Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.';; ?></textarea>
              </div>
              <div class="input">
                <label for="profissional_2_titulo">Profissional 2</label>
                <img src="../empresa/assets/images/<?php echo $empresa['profissional_2_imagem']; ?>" alt="profissional"/>
                <input type="file" name="profissional_2_imagem">
                <input type="text" name="profissional_2_titulo" value="<?php echo $empresa['profissional_2_titulo']; ?>">
                <textarea type="text" name="profissional_2_texto"><?php echo $empresa['profissional_2_texto'] ?? 'Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.';; ?></textarea>
              </div>
              <div class="input">
                <label for="profissional_3_titulo">Profissional 2</label>
               <img src="../empresa/assets/images/<?php echo $empresa['profissional_3_imagem']; ?>" alt="profissional"/>
                <input type="file" name="profissional_3_imagem">
                <input type="text" name="profissional_3_titulo" value="<?php echo $empresa['profissional_3_titulo']; ?>">
                <textarea type="text" name="profissional_3_texto"><?php echo $empresa['profissional_3_texto'] ?? 'Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.';; ?></textarea>
              </div>
              </div>
              <br><h3>galeria</h3>
              <div class="inputs inputs-4">
                <div class="input">
                  <label for="foto_1">
                    <p>Foto 1</p>
                    <img src="../empresa/assets/images/<?php echo $empresa['foto_1']; ?>" alt="foto 1"/>
                    <input type="file" name="foto_1">
                  </label>
                </div>
                <div class="input">
                  <label for="foto_2">
                    <p>Foto 2</p>
                    <img src="../empresa/assets/images/<?php echo $empresa['foto_2']; ?>" alt="foto 2"/>
                    <input type="file" name="foto_2">
                  </label>
                </div>
                <div class="input">
                  <label for="foto_3">
                    <p>Foto 3</p>
                    <img src="../empresa/assets/images/<?php echo $empresa['foto_3']; ?>" alt="foto 3"/>
                    <input type="file" name="foto_3">
                  </label>
                </div>
                <div class="input">
                  <label for="foto_4">
                    <p>Foto 4</p>
                    <img src="../empresa/assets/images/<?php echo $empresa['foto_4']; ?>" alt="foto 4"/>
                    <input type="file" name="foto_4">
                  </label>
                </div>
                <div class="input">
                  <label for="foto_5">
                    <p>Foto 5</p>
                    <img src="../empresa/assets/images/<?php echo $empresa['foto_5']; ?>" alt="foto 5"/>
                    <input type="file" name="foto_5">
                  </label>
                </div>
              </div>
              <br><h3>sessão de cards</h3>
              <div class="inputs inputs-5">
                <div class="input">
                  <label for="">Card 1</label>
                  <input type="text" name="metodo_1_titulo" value="<?php echo $empresa['metodo_1_titulo']; ?>">
                  <textarea type="text" name="metodo_1_texto"><?php echo $empresa['metodo_1_texto'] ?? 'Explorar novas ideias e caminhos que podem transformar projetos em algo único.'; ?></textarea>
                </div>
                <div class="input">
                  <label for="">Card 2</label>
                  <input type="text" name="metodo_2_titulo" value="<?php echo $empresa['metodo_2_titulo']; ?>">
                  <textarea type="text" name="metodo_2_texto"><?php echo $empresa['metodo_2_texto'] ?? 'Investigar e analisar profundamente para encontrar soluções sólidas e eficazes.'; ?></textarea>
                </div>
                <div class="input">
                  <label for="">Card 3</label>
                  <input type="text" name="metodo_3_titulo" value="<?php echo $empresa['metodo_3_titulo']; ?>">
                  <textarea type="text" name="metodo_3_texto"><?php echo $empresa['metodo_3_texto'] ?? 'Transformar conceitos em formas visuais e funcionais que encantam e resolvem.'; ?></textarea>
                </div>
                <div class="input">
                  <label for="">Card 4</label>
                  <input type="text" name="metodo_4_titulo" value="<?php echo $empresa['metodo_4_titulo']; ?>">
                  <textarea type="text" name="metodo_4_texto"><?php echo $empresa['metodo_4_texto'] ?? 'Refinar detalhes até alcançar o equilíbrio perfeito entre estética e eficiência.'; ?></textarea>
                </div>
              </div>
              <br><h3>sessão de ícones</h3>
              <div class="input">
                <label for="sobre_2">Mais sobre a empresa</label>
                <textarea name="sobre_2"><?php echo $empresa['sobre_2'] ?? 'Sobre a história da empresa. Edite no painel.'; ?></textarea>
              </div>
              <div class="inputs inputs-6">
    <!-- Input 1 -->
    <div class="input">
      <img :src="card1.icon || '<?php echo $empresa['icone_card_1']; ?>'" alt="" width="50">
      <label>Ícone 1</label>
      <button class="btn-icones" @click.prevent="openModal('card1')">selecionar ícone</button>
      <input type="text" name="icone_card_1" v-model="card1.icon" style="display:none">
      <input type="text" name="titulo_card_1" value="<?php echo $empresa['titulo_card_1'];?>" >
      <input type="text" name="subtitulo_card_1" value="<?php echo $empresa['subtitulo_card_1'];?>" >
    </div>

    <!-- Input 2 -->
    <div class="input">
      <img :src="card1.icon || '<?php echo $empresa['icone_card_2']; ?>'" alt="" width="50">
      <label>Ícone 2</label>
      <button class="btn-icones" @click.prevent="openModal('card2')">selecionar ícone</button>
      <input type="text" name="icone_card_2" v-model="card2.icon" style="display:none">
      <input type="text" name="titulo_card_2" value="<?php echo $empresa['titulo_card_2'];?>">
      <input type="text" name="subtitulo_card_2" value="<?php echo $empresa['subtitulo_card_2'];?>">
    </div>

    <!-- Input 3 -->
    <div class="input">
       <img :src="card1.icon || '<?php echo $empresa['icone_card_3']; ?>'" alt="" width="50">
      <label>Ícone 3</label>
      <button class="btn-icones" @click.prevent="openModal('card3')">selecionar ícone</button>
      <input type="text" name="icone_card_3" v-model="card3.icon" style="display:none">
      <input type="text" name="titulo_card_3" value="<?php echo $empresa['titulo_card_3'];?>">
      <input type="text" name="subtitulo_card_3" value="<?php echo $empresa['subtitulo_card_3'];?>">
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