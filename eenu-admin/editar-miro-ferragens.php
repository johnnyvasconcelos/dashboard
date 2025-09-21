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

if (isset($_POST['atualizar'])) {
    $titulo = $_POST['titulo'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $sobre1 = $_POST['sobre_1'];
    $sobre2 = $_POST['sobre_2'];
    $sobre3 = $_POST['sobre_3'];
    $tituloProfissional1 = $_POST['profissional_1_titulo'];
    $tituloProfissional2 = $_POST['profissional_2_titulo'];
    $tituloProfissional3 = $_POST['profissional_3_titulo'];
    $textoProfissional1 = $_POST['profissional_1_texto'];
    $textoProfissional2 = $_POST['profissional_2_texto'];
    $textoProfissional3 = $_POST['profissional_3_texto'];
    $metodoTexto1 = $_POST['metodo_1_texto'];
    $metodoTexto2 = $_POST['metodo_2_texto'];
    $metodoTexto3 = $_POST['metodo_3_texto'];
    $metodoTexto4 = $_POST['metodo_4_texto'];
    $metodoTitulo1 = $_POST['metodo_1_titulo'];
    $metodoTitulo2 = $_POST['metodo_2_titulo'];
    $metodoTitulo3 = $_POST['metodo_3_titulo'];
    $metodoTitulo4 = $_POST['metodo_4_titulo'];
    $tituloCard1 = $_POST['titulo_card_1'];
    $tituloCard2 = $_POST['titulo_card_2'];
    $tituloCard3 = $_POST['titulo_card_3'];
    $subtituloCard1 = $_POST['subtitulo_card_1'];
    $subtituloCard2 = $_POST['subtitulo_card_2'];
    $subtituloCard3 = $_POST['subtitulo_card_3'];
$iconeCard1 = $_POST['icone_card_1'] ?? $empresa['icone_card_1'];
$iconeCard2 = $_POST['icone_card_2'] ?? $empresa['icone_card_2'];  
$iconeCard3 = $_POST['icone_card_3'] ?? $empresa['icone_card_3'];
    $pastaDestino = '../empresa/assets/images/';

    // ---------------- FOTO CABEÇALHO ----------------
    if (!empty($_FILES['foto_cabecalho']['name'])) {
        $arquivo = $_FILES['foto_cabecalho'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'header-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto cabeçalho!</p>";
            exit;
        }
        $foto_cabecalho = $nomeArquivo;
    } else {
        $foto_cabecalho = $empresa['foto_cabecalho'];
    }

    // ---------------- FOTO SOBRE ----------------
    if (!empty($_FILES['foto_sobre']['name'])) {
        $arquivo = $_FILES['foto_sobre'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'sobre-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto sobre!</p>";
            exit;
        }
        $foto_sobre = $nomeArquivo;
    } else {
        $foto_sobre = $empresa['foto_sobre'];
    }


        // ---------------- FOTO LOGO ----------------
    if (!empty($_FILES['logo']['name'])) {
        $arquivo = $_FILES['logo'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'logo-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto logo!</p>";
            exit;
        }
        $logo = $nomeArquivo;
    } else {
        $logo = $empresa['logo'];
    }


            // ---------------- PROFISSIONAL 1 IMAGEM ----------------
    if (!empty($_FILES['profissional_1_imagem']['name'])) {
        $arquivo = $_FILES['profissional_1_imagem'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'time-1-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto do profissional!</p>";
            exit;
        }
        $fotoProfissional1 = $nomeArquivo;
    } else {
        $fotoProfissional1 = $empresa['profissional_1_imagem'];
    }


           // ---------------- PROFISSIONAL 2 IMAGEM ----------------
    if (!empty($_FILES['profissional_2_imagem']['name'])) {
        $arquivo = $_FILES['profissional_2_imagem'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'time-2-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto do profissional!</p>";
            exit;
        }
        $fotoProfissional2 = $nomeArquivo;
    } else {
        $fotoProfissional2 = $empresa['profissional_2_imagem'];
    }

            // ---------------- PROFISSIONAL 3 IMAGEM ----------------
    if (!empty($_FILES['profissional_3_imagem']['name'])) {
        $arquivo = $_FILES['profissional_3_imagem'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'time-3-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto do profissional!</p>";
            exit;
        }
        $fotoProfissional3 = $nomeArquivo;
    } else {
        $fotoProfissional3 = $empresa['profissional_3_imagem'];
    }

    
            // ---------------- FOTO GALERIA 1 ----------------
    if (!empty($_FILES['foto_1']['name'])) {
        $arquivo = $_FILES['foto_1'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'galeria-1-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto do profissional!</p>";
            exit;
        }
        $foto1 = $nomeArquivo;
    } else {
        $foto1 = $empresa['foto_1'];
    }


            // ---------------- FOTO GALERIA 2 ----------------
      if (!empty($_FILES['foto_2']['name'])) {
        $arquivo = $_FILES['foto_2'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'galeria-2-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto do profissional!</p>";
            exit;
        }
        $foto2 = $nomeArquivo;
    } else {
        $foto2 = $empresa['foto_2'];
    }

    
            // ---------------- FOTO GALERIA 3 ----------------
      if (!empty($_FILES['foto_3']['name'])) {
        $arquivo = $_FILES['foto_3'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'galeria-3-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto do profissional!</p>";
            exit;
        }
        $foto3 = $nomeArquivo;
    } else {
        $foto3 = $empresa['foto_3'];
    }


                // ---------------- FOTO GALERIA 4 ----------------
      if (!empty($_FILES['foto_4']['name'])) {
        $arquivo = $_FILES['foto_4'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'galeria-4-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto do profissional!</p>";
            exit;
        }
        $foto4 = $nomeArquivo;
    } else {
        $foto4 = $empresa['foto_4'];
    }


               // ---------------- FOTO GALERIA 5 ----------------
      if (!empty($_FILES['foto_5']['name'])) {
        $arquivo = $_FILES['foto_5'];
        if ($arquivo['size'] > 200 * 1024) {
            echo "<p>Arquivo muito grande! Máx 200KB.</p>";
            exit;
        }
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'galeria-5-' . $slug . '.' . $extensao;
        $caminhoCompleto = $pastaDestino . $nomeArquivo;
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
            echo "<p>Erro ao enviar foto do profissional!</p>";
            exit;
        }
        $foto5 = $nomeArquivo;
    } else {
        $foto5 = $empresa['foto_5'];
    }




    // ---------------- UPDATE BANCO ----------------
    $sql = "UPDATE empresas_sites 
            SET logo = ?, titulo = ?, email = ?, whatsapp = ?, sobre_1 = ?, sobre_2 = ?, sobre_3 = ?, foto_cabecalho = ?, foto_sobre = ?, profissional_1_imagem = ?, profissional_2_imagem = ?, profissional_3_imagem = ?, profissional_1_titulo = ?, profissional_2_titulo = ?, profissional_3_titulo = ?, profissional_1_texto = ?, profissional_2_texto = ?, profissional_3_texto = ?, foto_1 = ?, foto_2 = ?, foto_3 = ?, foto_4 = ?, foto_5 = ?, metodo_1_texto = ?, metodo_2_texto = ?, metodo_3_texto  = ?, metodo_4_texto = ?, metodo_1_titulo = ?, metodo_2_titulo = ?, metodo_3_titulo = ?, metodo_4_titulo = ?, titulo_card_1 = ?, titulo_card_2 = ?, titulo_card_3 = ?, subtitulo_card_1 = ?, subtitulo_card_2 = ?, subtitulo_card_3 = ?, icone_card_1 = ?, icone_card_2 = ?, icone_card_3 = ?
            WHERE slug = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssssssssssssssssssssss", $logo, $titulo, $email, $whatsapp, $sobre1, $sobre2, $sobre3, $foto_cabecalho, $foto_sobre, $fotoProfissional1, $fotoProfissional2, $fotoProfissional3, $tituloProfissional1, $tituloProfissional2, $tituloProfissional3, $textoProfissional1, $textoProfissional2, $textoProfissional3, $foto1, $foto2, $foto3, $foto4, $foto5, $metodoTexto1, $metodoTexto2, $metodoTexto3, $metodoTexto4, $metodoTitulo1, $metodoTitulo2, $metodoTitulo3, $metodoTitulo4, $tituloCard1, $tituloCard2, $tituloCard3, $subtituloCard1, $subtituloCard2, $subtituloCard3, $iconeCard1, $iconeCard2, $iconeCard3, $slug);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<p>Erro ao atualizar dados: " . $stmt->error . "</p>";
    }
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
              <?php
              $protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' 
                            || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
              $host = $_SERVER['HTTP_HOST'];
              $urlBase = $protocolo . $host;
              ?>
              <a href="<?php echo $urlBase . '/empresa/' . $empresa['slug'] . '.php'; ?>" 
              class="main-slug" target="_blank">
                Ver Site &#128065;
            </a>
            <h1>Editar Site</h1>
             <form method="POST" class="editar-empresa" enctype="multipart/form-data" enctype="multipart/form-data">
              <h3>informações gerais</h3>
              <div class="inputs inputs-1">
              <div class="input input-image">
                <label class="label-img" for="foto_cabecalho"><img src="../empresa/assets/images/<?php echo $empresa['foto_cabecalho']; ?>" alt="cabeçalho imagem"/></label>
                <input type="file" name="foto_cabecalho" accept="image/*">
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
              <div class="inputs inputs-logo">
                <img src="../empresa/assets/images/<?php echo $empresa['logo'] ?? 'logo.webp'; ?>" alt="logo site" class="form-logo"/>
                <input type="file" name="logo" value="">
              </div>
              <br><h3>sobre a empresa</h3>
              <div class="inputs inputs-2">
                <div class="input">
                  <label for="sobre_1">Sobre a empresa</label>
                  <textarea name="sobre_1"><?php echo $empresa['sobre_1'] ?? 'Mais informações sobre a empresa. Edite no painel.'; ?></textarea>
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
                <label for="profissional_3_titulo">Profissional 3</label>
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
    <img :src="card1.icon ? 'assets/images/' + card1.icon : 'assets/images/<?php echo $empresa['icone_card_1']; ?>'" alt="" width="50">
    <label>Ícone 1</label>
    <div class="btn-icones" @click.prevent="openModal('card1')">selecionar ícone</div>
    <input type="hidden" name="icone_card_1" :value="card1.icon || '<?php echo $empresa['icone_card_1']; ?>'">
    <input type="text" name="titulo_card_1" value="<?php echo $empresa['titulo_card_1']; ?>" placeholder="Título do card 1">
    <input type="text" name="subtitulo_card_1" value="<?php echo $empresa['subtitulo_card_1']; ?>" placeholder="Subtítulo do card 1">
  </div>

  <!-- Input 2 -->
  <div class="input">
    <img :src="card2.icon ? 'assets/images/' + card2.icon : 'assets/images/<?php echo $empresa['icone_card_2']; ?>'" alt="" width="50">
    <label>Ícone 2</label>
    <div class="btn-icones" @click.prevent="openModal('card2')">selecionar ícone</div>
    <input type="hidden" name="icone_card_2" :value="card2.icon || '<?php echo $empresa['icone_card_2']; ?>'">
    <input type="text" name="titulo_card_2" value="<?php echo $empresa['titulo_card_2']; ?>" placeholder="Título do card 2">
    <input type="text" name="subtitulo_card_2" value="<?php echo $empresa['subtitulo_card_2']; ?>" placeholder="Subtítulo do card 2">
  </div>

  <!-- Input 3 -->
  <div class="input">
    <img :src="card3.icon ? 'assets/images/' + card3.icon : 'assets/images/<?php echo $empresa['icone_card_3']; ?>'" alt="" width="50">
    <label>Ícone 3</label>
    <div class="btn-icones" @click.prevent="openModal('card3')">selecionar ícone</div>
    <input type="hidden" name="icone_card_3" :value="card3.icon || '<?php echo $empresa['icone_card_3']; ?>'">
    <input type="text" name="titulo_card_3" value="<?php echo $empresa['titulo_card_3']; ?>" placeholder="Título do card 3">
    <input type="text" name="subtitulo_card_3" value="<?php echo $empresa['subtitulo_card_3']; ?>" placeholder="Subtítulo do card 3">
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
        style="cursor:pointer; margin:5px; border: 2px solid transparent; border-radius: 4px;"
        :style="{ 'border-color': (currentCard && icon.includes(currentCard.icon)) ? '#007bff' : 'transparent' }"
      >
    </div>
    <div class="fecha-modal" @click="closeModal" style="cursor:pointer; margin-top:15px; padding:10px; background:#ccc; text-align:center; border-radius:4px;">Fechar</div>
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
        <div class="fecha-modal" @click="closeModal">Fechar</div>
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