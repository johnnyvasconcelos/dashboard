<?php
require '../includes/config.php';
$nomeEmpresa = basename($_SERVER['PHP_SELF'], ".php");
$nomeEmpresaFormatado = ucwords(str_replace('-', ' ', strtolower($nomeEmpresa)));
$stmt = $conn->prepare("SELECT titulo FROM empresas_sites WHERE slug = ?");
$stmt->bind_param("s", $nomeEmpresa);
$stmt->execute();
$result = $stmt->get_result();
$dados = $result->fetch_assoc();
$titulo = $dados['titulo'] ?? "Empresa não encontrada";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/style/css.css" />
    <script src="./assets/javascript/menu.js" defer></script>
    <title>EENU - <?php echo $nomeEmpresaFormatado; ?></title>
  </head>
  <body>
    <div class="wrapper">
      <nav class="nav">
        <div class="container">
          <a href="#" class="logo">
            <img src="./assets/images/logo.webp" alt="logo" />
          </a>
          <ul class="menu">
            <a href="#" class="logo-mob">
              <img src="./assets/images/logo-black.webp" alt="logo" />
            </a>
            <li><a href="#">Início</a></li>
            <li><a href="#sobre">Sobre</a></li>
            <li><a href="#equipe">Equipe</a></li>
            <li><a href="#gallery">Galeria</a></li>
            <li><a href="#contact">Contato</a></li>
            <p class="copy">Studio Prisma - Todos os Direitos Reservados.</p>
          </ul>
          <div class="menu-overlay"></div>
          <a class="nav-btn" href="#gallery"><span>Portfólio</span></a>
          <div class="mob-btn">
            <span class="pipe"></span>
          </div>
        </div>
      </nav>
      <header class="header">
        <div class="container">
          <div class="title-area">
            <h2 class="h1-subtitle">Bem-Vindo(a) ao</h2>
            <h1 id="typewriter"><?php echo $titulo; ?></h1>
            <button class="title-btn">saiba mais</button>
          </div>
        </div>
      </header>
      <section class="about" id="sobre">
        <div class="background">
          <div class="container">
            <div class="text">
              <h2>Mais Sobre <?php echo $titulo; ?></h2>
              <p>
                Fundado pela visionária francesa Élise Montclair, o Studio
                Prisma trouxe a sofisticação dos eventos de Paris para São
                Paulo. Especializado em design de moda autoral, cria coleções
                inspiradas na arte contemporânea e na elegância urbana.
              </p>
              <a href="#" class="btn">saiba mais</a>
            </div>
          </div>
          <div class="image"></div>
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
              <h3>Descoberta</h3>
            </div>
            <div class="icon-area">
              <div class="icon">
                <img src="./assets/images/search.svg" alt="search" />
              </div>
              <h3>Pesquisa</h3>
            </div>
            <div class="circle">
              <h4>Descoberta</h4>
              <p>
                Explorar novas ideias e caminhos que podem transformar projetos
                em algo único.
              </p>
            </div>
            <div class="icon-area">
              <div class="icon">
                <img src="./assets/images/sun.svg" alt="sun" />
              </div>
              <h3>Designing</h3>
            </div>
            <div class="icon-area icon-area-3">
              <div class="icon">
                <img src="./assets/images/cog.svg" alt="cog" />
              </div>
              <h3>Ajustes</h3>
            </div>
          </div>
        </div>
      </section>
      <section class="galeria" id="gallery">
        <div class="container">
          <h2>Galeria de Eventos</h2>
          <div class="carrossel-area"></div>
        </div>
      </section>
      <section class="icones-area">
        <div class="container">
          <p>
            A Studio Prisma é um estúdio criativo que transforma inspirações da
            moda parisiense em experiências únicas em São Paulo. Combinamos
            design contemporâneo e referências da alta-costura para criar
            eventos, cenários e identidades visuais que conectam pessoas e
            marcas de forma elegante e memorável.
          </p>
          <div class="icones">
            <div class="icone">
              <img src="./assets/images/heart.svg" alt="heart" />
              <span>180+</span>
              <p>Clientes Atendidos</p>
            </div>
            <div class="icone">
              <img src="./assets/images/scissors.svg" alt="scissor" />
              <span>470+</span>
              <p>Coleções Criadas</p>
            </div>
            <div class="icone">
              <img src="./assets/images/trophy.svg" alt="award" />
              <span>25+</span>
              <p>Prêmios Ganhos</p>
            </div>
          </div>
        </div>
      </section>
      <section class="cta">
        <div class="container">
          <p>Crie designs que impressionam. Vamos começar?</p>
          <a href="#" class="cta-btn">Contato</a>
        </div>
      </section>
      <section class="team" id="equipe">
        <div class="container">
          <div class="title">
            <h2>Nosso Time</h2>
            <p>
              Premiada no Fashion Innovators Awards de Paris, nossa equipe reúne
              designers, ilustradores e consultores de moda comprometidos em
              criar coleções sofisticadas e cheias de personalidade.
            </p>
          </div>
        </div>
        <div class="container">
          <div class="time">
            <div class="conteudo">
              <h4>Élise Montclair, Fundadora</h4>
              <p>
                Francesa que trouxe sua visão criativa para o Brasil, Élise
                fundou o Studio Prisma e conquistou prêmios internacionais com
                seu olhar inovador sobre moda e design.
              </p>
            </div>
            <article>
              <img src="./assets/images/time-1.webp" alt="Élise Montclair" />
            </article>
          </div>

          <div class="time">
            <div class="conteudo">
              <h4>Cláudia Vervenne, Diretora de Criação</h4>
              <p>
                Brasileira apaixonada por artes visuais, Cláudia coordena
                projetos de identidade estética no Studio Prisma, unindo moda,
                fotografia e direção criativa em campanhas de impacto.
              </p>
            </div>
            <article>
              <img src="./assets/images/time-2.webp" alt="Cláudia Vervenne" />
            </article>
          </div>

          <div class="time">
            <div class="conteudo">
              <h4>Rafael S. Lacerda, Estilista</h4>
              <p>
                Com estilo autoral e ousado, Rafael traz referências da cultura
                brasileira para o universo fashion, criando coleções que
                equilibram modernidade e tradição.
              </p>
            </div>
            <article>
              <img src="./assets/images/time-3.webp" alt="Rafael S. Lacerda" />
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
                <li>(11) 99000-0000</li>
                <li>contato@studioprisma.net</li>
                <br />
                <li>Rua Verbo Divino, 0 - São Paulo Capital</li>
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
      "Explorar novas ideias e caminhos que podem transformar projetos em algo único.",
    Pesquisa:
      "Investigar e analisar profundamente para encontrar soluções sólidas e eficazes.",
    Designing:
      "Transformar conceitos em formas visuais e funcionais que encantam e resolvem.",
    Ajustes:
      "Refinar detalhes até alcançar o equilíbrio perfeito entre estética e eficiência.",
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
      <div class="carrossel-item"><img src="./assets/images/item-1.webp" alt="item 1"></div>
      <div class="carrossel-item"><img src="./assets/images/item-2.webp" alt="item 2"></div>
      <div class="carrossel-item"><img src="./assets/images/item-3.webp" alt="item 3"></div>
      <div class="carrossel-item"><img src="./assets/images/item-4.webp" alt="item 4"></div>
      <div class="carrossel-item"><img src="./assets/images/item-5.webp" alt="item 5"></div>
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
</script>
  </body>
</html>
