<?php
  require '../eenu-admin/includes/config.php';
  $nomeEmpresa = basename($_SERVER['PHP_SELF'], ".php");
  $nomeEmpresaFormatado = ucwords(str_replace('-', ' ', strtolower($nomeEmpresa)));
  $stmt = $conn->prepare("SELECT * FROM empresas_sites WHERE slug = ?");
  $stmt->bind_param("s", $nomeEmpresa);
  $stmt->execute();
  $result = $stmt->get_result();
  $dados = $result->fetch_assoc();
  $titulo = $dados['titulo'] ?? "Empresa não encontrada";
  $whatsapp = $dados['whatsapp'];
  $email = $dados['email'];
  $sobre1 = $dados['sobre_1'] ?? 'Mais informações sobre a empresa. Edite no painel.';
  $sobre2 = $dados['sobre_2'] ?? 'Sobre a história da empresa. Edite no painel.';
  $sobre3 = $dados['sobre_3'] ?? 'Sobre a nossa equipe. Edite no painel.';
  $metodo1Titulo = $dados['metodo_1_titulo'];
  $metodo2Titulo = $dados['metodo_2_titulo'];
  $metodo3Titulo = $dados['metodo_3_titulo'];
  $metodo4Titulo = $dados['metodo_4_titulo'];
  $metodo1Texto = $dados['metodo_1_texto'] ?? 'Explorar novas ideias e caminhos que podem transformar projetos em algo único.';
  $metodo2Texto = $dados['metodo_2_texto'] ?? 'Investigar e analisar profundamente para encontrar soluções sólidas e eficazes.';
  $metodo3Texto = $dados['metodo_3_texto'] ?? 'Transformar conceitos em formas visuais e funcionais que encantam e resolvem.';
  $metodo4Texto = $dados['metodo_4_texto'] ?? 'Refinar detalhes até alcançar o equilíbrio perfeito entre estética e eficiência.';
  $foto1 = $dados['foto_1'];
  $foto2 = $dados['foto_2'];
  $foto3 = $dados['foto_3'];
  $foto4 = $dados['foto_4'];
  $foto5 = $dados['foto_5'];
  $iconeCard1 = $dados['icone_card_1'];
  $iconeCard2 = $dados['icone_card_2'];
  $iconeCard3 = $dados['icone_card_3'];
  $tituloCard1 = $dados['titulo_card_1'];
  $tituloCard2 = $dados['titulo_card_2'];
  $tituloCard3 = $dados['titulo_card_3'];
  $subtituloCard1 = $dados['subtitulo_card_1'];
  $subtituloCard2 = $dados['subtitulo_card_2'];
  $subtituloCard3 = $dados['subtitulo_card_3'];
  $profissional1Titulo = $dados['profissional_1_titulo'];
  $profissional2Titulo = $dados['profissional_2_titulo'];
  $profissional3Titulo = $dados['profissional_3_titulo'];
  $profissional1Imagem = $dados['profissional_1_imagem'];
  $profissional2Imagem = $dados['profissional_2_imagem'];
  $profissional3Imagem = $dados['profissional_3_imagem'];
  $profissional1Texto = $dados['profissional_1_texto'] ?? 'Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.';
  $profissional2Texto = $dados['profissional_2_texto'] ?? 'Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.';
  $profissional3Texto = $dados['profissional_3_texto'] ?? 'Um profissional dedicado, comprometido com resultados e sempre atento aos detalhes. Atua com seriedade, ética e busca constante por melhorias, oferecendo um atendimento de qualidade e soluções eficientes para cada desafio.';
  $slug = $dados['slug'];
  $fotoSobre = $dados['foto_sobre'];
  $fotoCabecalho = $dados['foto_cabecalho'];
  $logo = $dados['logo'];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/style/css.css" />
    <link rel="icon" href="./assets/images/favicon.webp" type="image/x-icon">
    <script src="./assets/javascript/menu.js" defer></script>
    <title>EENU - <?php echo $nomeEmpresaFormatado; ?></title>
  </head>
  <body>
    <div class="wrapper">
      <nav class="nav">
        <div class="container">
          <a href="./<?php echo $slug; ?>.php" class="logo">
            <img src="./assets/images/<?php echo $logo; ?>" alt="logo" />
          </a>
          <ul class="menu">
            <header class="area-logo">
              <a href="./<?php echo $slug; ?>.php" class="logo-mob">
                <img src="./assets/images/<?php echo $logo; ?>" alt="logo" />
              </a>
            </header>
            <li><a href="#">Início</a></li>
            <li><a href="#sobre">Sobre</a></li>
            <li><a href="#equipe">Equipe</a></li>
            <li><a href="#gallery">Portfólio</a></li>
            <li><a href="#contact">Contato</a></li>
            <p class="copy">Studio Prisma - Todos os Direitos Reservados.</p>
          </ul>
          <div class="menu-overlay"></div>
          <a class="nav-btn" href="#gallery"><span>Galeria</span></a>
          <div class="mob-btn">
            <span class="pipe"></span>
          </div>
        </div>
      </nav>
      <header class="header" style="background-image: url(assets/images/<?php echo $fotoCabecalho ?>);">
        <div class="container">
          <div class="title-area">
            <h2 class="h1-subtitle">Bem-Vindo(a) ao</h2>
            <h1 id="typewriter"><?php echo $titulo; ?></h1>
            <a class="title-btn" target="_blank" href="https://wa.me/55<?php echo $whatsapp; ?>">saiba mais</a>
          </div>
        </div>
      </header>
      <section class="about" id="sobre">
        <div class="background">
          <div class="container">
            <div class="text">
              <h2>Mais Sobre <?php echo $nomeEmpresaFormatado; ?></h2>
              <p>
                <?php echo $sobre1; ?>
              </p>
              <a href="#" class="btn">saiba mais</a>
            </div>
          </div>
          <div class="image" style="background-image: url(assets/images/<?php echo $fotoSobre; ?>);"></div>
        </div>
      </section>
      <section class="method">
        <div class="container">
          <h2>Nosso Método</h2>
        </div>
        <div class="container">
          <div class="circle-area">
            <div class="icon-area">
              <div class="icon active">
                <img src="./assets/images/light.svg" alt="light" />
              </div>
              <h3><?php echo $metodo1Titulo; ?></h3>
            </div>
            <div class="icon-area">
              <div class="icon">
                <img src="./assets/images/search.svg" alt="search" />
              </div>
              <h3><?php echo $metodo2Titulo; ?></h3>
            </div>
            <div class="circle">
              <h4><?php echo $metodo1Titulo; ?></h4>
              <p>
                <?php echo $metodo1Texto; ?>
              </p>
            </div>
            <div class="icon-area">
              <div class="icon">
                <img src="./assets/images/sun.svg" alt="sun" />
              </div>
              <h3><?php echo $metodo3Titulo; ?></h3>
            </div>
            <div class="icon-area icon-area-3">
              <div class="icon">
                <img src="./assets/images/cog.svg" alt="cog" />
              </div>
              <h3><?php echo $metodo4Titulo; ?></h3>
            </div>
          </div>
        </div>
      </section>
      <section class="galeria" id="gallery">
        <div class="container">
          <h2>Galeria de Projetos</h2>
          <div class="carrossel-area"></div>
        </div>
      </section>
      <section class="icones-area">
        <div class="container">
          <p>
            <?php echo $sobre2; ?>
          </p>
          <div class="icones">
            <div class="icone">
              <img src="./assets/images/<?php echo $iconeCard1; ?>" alt="icone 1" />
              <span><?php echo $tituloCard1; ?></span>
              <p><?php echo $subtituloCard1; ?></p>
            </div>
            <div class="icone">
              <img src="./assets/images/<?php echo $iconeCard2; ?>" alt="icone 2" />
              <span><?php echo $tituloCard2; ?></span>
              <p><?php echo $subtituloCard2; ?></p>
            </div>
            <div class="icone">
              <img src="./assets/images/<?php echo $iconeCard3; ?>" alt="icone 3" />
              <span><?php echo $tituloCard3; ?></span>
              <p><?php echo $subtituloCard3; ?></p>
            </div>
          </div>
        </div>
      </section>
      <section class="cta">
        <div class="container">
          <p>Confiança que gera resultados. Vamos começar?</p>
          <a href="https://wa.me/55<?php echo $whatsapp; ?>" target="_blank" class="cta-btn">Contato</a>
        </div>
      </section>
      <section class="team" id="equipe">
        <div class="container">
          <div class="title">
            <h2>Nosso Time</h2>
            <p>
              <?php echo $sobre3; ?>
            </p>
          </div>
        </div>
        <div class="container">
          <div class="time">
            <div class="conteudo">
              <h4><?php echo $profissional1Titulo; ?></h4>
              <p>
                <?php echo $profissional1Texto; ?>
              </p>
            </div>
            <article>
              <img src="./assets/images/<?php echo $profissional1Imagem; ?>" alt="Élise Montclair" />
            </article>
          </div>

          <div class="time">
            <div class="conteudo">
              <h4><?php echo $profissional2Titulo; ?></h4>
              <p>
                <?php echo $profissional2Texto; ?>
              </p>
            </div>
            <article>
              <img src="./assets/images/<?php echo $profissional2Imagem; ?>" alt="Cláudia Vervenne" />
            </article>
          </div>

          <div class="time">
            <div class="conteudo">
              <h4><?php echo $profissional3Titulo; ?></h4>
              <p>
                <?php echo $profissional3Texto; ?>
              </p>
            </div>
            <article>
              <img src="./assets/images/<?php echo $profissional3Imagem; ?>" alt="Rafael S. Lacerda" />
            </article>
          </div>
        </div>
      </section>
      <div class="form-area" id="contact">
        <div class="container">
          <h2>Entre em contato</h2>
          <div class="contain">
            <form action="">
              <input type="text" placeholder="Seu nome" />
              <input type="email" placeholder="Seu e-mail" />
              <label>Sua mensagem</label>
              <textarea name="" id=""></textarea>
              <button type="button">enviar</button>
            </form>
            <div class="form-text">
              <h4>Em que você está pensado?</h4>
              <ul>
                <li>
                  <img style="width: 14px;" src="./assets/images/whatsapp.svg" alt="whatsapp svg icon">&nbsp;<span class="whatsapp-area"><?php echo $whatsapp; ?></span>
                </li>
                <li>
                  <img style="width: 16px; height: 13px;" src="./assets/images/email.svg" alt="email svg icon">&nbsp;<?php echo $email; ?>
                </li>
                <br />
                <?php
                $stmt2 = $conn->prepare("SELECT numero_sala, torre FROM empresas WHERE slug = ?");
                $stmt2->bind_param("s", $slug);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                $dadosEmpresa = $result2->fetch_assoc();
                $sala = $dadosEmpresa['numero_sala'] ?? null;
                $torre = $dadosEmpresa['torre'] ?? null;
                ?>
                <li>Rua Verbo Divino, 2001, Sala <?= htmlspecialchars($sala) ?> - <?= htmlspecialchars($torre) ?> - Chácara Santo Antônio (Esquina com a Marginal Pinheiros) - São Paulo - CEP: 04719-002</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        const el = document.getElementById("typewriter");
const texts = ["<?php echo $nomeEmpresaFormatado; ?>", "<?php echo $titulo; ?>"];
let i = 0;
let j = 0;
let current = "";
let isDeleting = false;

function type() {
  const full = texts[i];

  if (isDeleting) {
    current = full.substring(0, j--);
  } else {
    current = full.substring(0, j++);
  }

  el.textContent = current;
  el.classList.add("cursor");

  let speed = isDeleting ? 80 : 120;

  if (!isDeleting && j === full.length + 1) {
    speed = 1500;
    isDeleting = true;
  } else if (isDeleting && j === 0) {
    isDeleting = false;
    i = (i + 1) % texts.length;
    speed = 500;
  }

  setTimeout(type, speed);
}

type();

document.addEventListener("DOMContentLoaded", () => {
  const circle = document.querySelector(".circle");
  const title = circle.querySelector("h4");
  const text = circle.querySelector("p");

  const contents = {
    Descoberta:
      "<?php echo $metodo1Texto; ?>",
    Pesquisa:
      "<?php echo $metodo2Texto; ?>",
    Designing:
      "<?php echo $metodo3Texto; ?>",
    Ajustes:
      "<?php echo $metodo4Texto; ?>",
  };

  const iconAreas = document.querySelectorAll(".icon-area");

  iconAreas.forEach((area) => {
    area.addEventListener("click", () => {
      const selectedTitle = area.querySelector("h3").textContent;
      title.textContent = selectedTitle;
      text.textContent = contents[selectedTitle] || "Conteúdo em breve...";

      iconAreas.forEach((a) =>
        a.querySelector(".icon").classList.remove("active")
      );

      area.querySelector(".icon").classList.add("active");
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const area = document.querySelector(".carrossel-area");

  area.innerHTML = `
    <button class="carrossel-control prev">&laquo;</button>
    <div class="carrossel-track">
      <div class="carrossel-item"><img src="./assets/images/<?php echo $foto1; ?>" alt="item 1"></div>
      <div class="carrossel-item"><img src="./assets/images/<?php echo $foto2; ?>" alt="item 2"></div>
      <div class="carrossel-item"><img src="./assets/images/<?php echo $foto3; ?>" alt="item 3"></div>
      <div class="carrossel-item"><img src="./assets/images/<?php echo $foto4; ?>" alt="item 4"></div>
      <div class="carrossel-item"><img src="./assets/images/<?php echo $foto5; ?>" alt="item 5"></div>
    </div>
    <button class="carrossel-control next">&raquo;</button>
  `;

  const track = area.querySelector(".carrossel-track");
  const items = area.querySelectorAll(".carrossel-item");
  const prev = area.querySelector(".prev");
  const next = area.querySelector(".next");

  const totalItems = items.length;
  const visibleItems = 3;
  let index = 0;

  function updateCarousel() {
    const itemWidth = items[0].offsetWidth;
    track.style.transform = `translateX(-${index * itemWidth}px)`;
  }

  prev.addEventListener("click", () => {
    if (index > 0) {
      index--;
      updateCarousel();
    }
  });

  next.addEventListener("click", () => {
    if (index < totalItems - visibleItems) {
      index++;
      updateCarousel();
    }
  });

  updateCarousel();
});

function formatarTelefone(numero) {
  if (numero.length === 11) {
    return numero.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
  } else if (numero.length === 10) {
    return numero.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
  }
  return numero;
}

const li = document.querySelector(".whatsapp-area");
li.innerText = formatarTelefone(li.innerText);
</script>
  </body>
</html>