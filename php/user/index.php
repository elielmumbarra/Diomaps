<?php
require __DIR__ . "/../bootstrap.php";

if (!isset($_SESSION['usuario'])) {
	die("volta e loga direito");
}

$id = $_SESSION['usuario'];

$sql_query = $conexao->query("SELECT * FROM usuario WHERE id = '$id'") or die ($conexao->error);

$usuario = $sql_query->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIOMAPS</title>
    <link rel="stylesheet" href="../../css/index.css">

</head>
<body>


<div div vw class="enabled">
          <div vw-access-button class="active"></div>
          <div vw-plugin-wrapper></div>
          <div class="vw-plugin-top-wrapper"></div>
        </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>

<div class="gtranslate_wrapper"></div>       
        <script>window.gtranslateSettings = {"default_language":"pt","native_language_names":true,"detect_browser_language":true,"languages":["pt","en","es","ht","fr","zh-CN","de","ru","ar"],"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","alt_flags":{"pt":"brazil"}}</script>
        <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>







    <div id="inicio-cont">

        <img src="../../imgs/reciclagem.png" alt="" class="recicla-img">

        <div class="menu">
            <img src="../../imgs/logcompescuro.png" alt="">
            <!-- adiciona botão hamburguer (igual index.html/localizar.php) -->
            <div class="menu-icon" onclick="toggleMenu()">
              <img id="imgmenu" src="../../imgs/menu.png" alt="menu">
            </div>

            <ul>
              <div class="close-icon" onclick="toggleMenu()">
                <img id="imgmenu" src="../../imgs/close-branco.png" alt="fechar">
              </div>

              <li class="has-submenu">
                <a href="#func-cont" id="servicosToggle"> Serviços</a>
                <ul class="submenu">
                    <li><a href="html/blog.php">Blog</a></li>
                    <li><a href="localizar_user.php">Mapa</a></li>
                    <li><a href="../../pdf.pdf">horararios de coleta</a></li>
                    <li><a href="editar.php">Editar posto</a></li>
                </ul>
              </li>
              <li><a href="#blog-cont">Destaques</a></li>
              <li><a href="#rodape-cont"> Contatos</a></li>
              <li class="has-submenu">
                <a href="#" id="userToggle">Olá, <?php echo $usuario['nome']; ?>!</a>
                <ul class="submenu">
                  <li><a href="destruir_sessão.php">Sair</a></li>
                </ul>
              </li>

            </ul>
        </div>


        <div class="texto-cont">
            <div class="texto-desc">
                <p class="titulo-texto-inicio">
                    Descubra postos de coleta de lixo reciclável próximos a você de forma rápida e fácil!
                </p>
                <p>
                    Nosso site utiliza tecnologia de geolocalização para ajudá-lo a encontrar os pontos de coleta mais próximos, contribuindo para um mundo mais sustentável e verde. Faça a diferença agora mesmo.
                </p>
            </div>

            <a href="#func-cont"> <img src="../../imgs/setabaixa.png" alt=""></a>

        </div>

    </div>

    <div id="func-cont">
        <div class="titulo">
            <h1><b>|</b> Serviços</h1>
        </div>
        <div class="blog">
            <button class="activate-button" onclick="activateCard(this)"> <img src="../../imgs/plus.png" alt="">  </button>
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <a href="html/blog.php" class="titulo">
                        <img src="../../imgs/news.png" alt=""> 
                        <h1 class="titulo-text">Nosso blog</h1>
                    </a>
                </div>
                <div class="flip-card-back">
                    <p >oferece informações e notícias sobre reciclagem, sustentabilidade e práticas ecológicas. Explore artigos educativos, dicas práticas e novidades para se manter informado e engajado na construção de um ambiente mais sustentável.</p>
                </div>
            </div>
        </div>
        <div href="localizar_user.php" class="mapa">

            <button class="activate-button" onclick="activateCard(this)"> <img src="../../imgs/plus.png" alt="">  </button>
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="../../imgs/caixasrecicl.jpg" alt="">
                    <div class="titulo">
                        <img src="../../imgs/mapainicio.png" alt=""> 
                        <h1 class="titulo-text">Localizar</h1>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p>
                        Explore os postos de coleta próximos de forma intuitiva e eficiente e encontre locais para descarte responsável. 

                    </p>
                </div>
            </div>
            
        </div>
        <div href="../../" class="dia">

            <button class="activate-button" onclick="activateCard(this)"> <img src="../../imgs/plus.png" alt="">  </button>
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <div class="titulo">
                        <img src="../../imgs/diainicio.png" alt=""> 
                        <h1 class="titulo-text">Dias de coleta</h1>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p>oferece informações e notícias sobre reciclagem, sustentabilidade e práticas ecológicas. Explore artigos educativos, dicas práticas e novidades para se manter informado e engajado na construção de um ambiente mais sustentável.</p>
                </div>
            </div>

        </div>
        <div class="edit">

            <button class="activate-button" onclick="activateCard(this)"> <img src="../../imgs/plus.png" alt="">  </button>
            <div class="flip-card-inner" href="../../php/editar.php">
                <div class="flip-card-front">
                    <div class="titulo">
                        <img src="../../imgs/editarinicio.png" alt=""> 
                        <h1 class="titulo-text">Meu posto</h1>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p>oferece informações e notícias sobre reciclagem, sustentabilidade e práticas ecológicas. Explore artigos educativos, dicas práticas e novidades para se manter informado e engajado na construção de um ambiente mais sustentável.</p>
                </div>
            </div>

        </div>
    </div>

    <div id="arvore-cont">
        <img src="../../imgs/arvorefundo.png" alt="">
    </div>


    <div id="blog-cont">
        <div class="titulo">
            <h1><b>|</b> Destaques</h1>
            <p>Nossas principais noticias</p>
        </div>

        <div class="carousel-container">
            <div class="carousel" id="carousel">
              <div class="carousel-item">
                    <img src="../../imgs/noticia 1.jpeg" alt="floresta">
                    <div class="desc-noticia-cont">
                        <h3>Programa “Reflorestar” de Santana de Parnaíba terá ações com foco na preservação</h3>
                        <p> 
                            Medida visa implantar iniciativas de conservação e recuperação do meio ambiente
                        </p>
                    </div>

                    <a href="html/noticia.php">ler noticia</a>
                </div>
                <div class="carousel-item">
                    <img src="../../imgs/noticia2.jpg" alt="Alphaville">
                    <div class="desc-noticia-cont">
                        <h3>Santana de Parnaíba promove diferentes atividades em Alphaville com foco no meio ambiente</h3>
                        <p> 
                            Serão promovidos cursos e trilhas
                        </p>
                    </div>

                    <a href="html/noticia2.php">ler noticia</a>
                </div>
                
                <div class="carousel-item">
                    <img src="../../imgs/noticia3.jpg" alt="">
                    <div class="desc-noticia-cont">
                        <h3>Prefeito de Santana de Parnaíba, Marcos Tonho, se reúne com Sabesp para discutir planejamento de 2023</h3>
                        <p> 
                            Na manhã do dia 27 de fevereiro,
                            aconteceu na prefeitura de Santana de Parnaíba
                            o encontro entre a equipe da Sabesp
                        </p>
                    </div>

                    <a href="html/noticia3.php">ler noticia</a>
                </div>

                
                <div class="carousel-item">
                    <img src="../../imgs/imagem4.jpeg" alt="">
                    <div class="desc-noticia-cont">
                        <h3>Santana de Parnaíba realizou a entrega de mudas de árvores em Alphaville</h3>
                        <p> 
                            Ação aconteceu na quinta-feira (22/06), no Ces Alphaville.
                        </p>
                    </div>

                    <a href="html/noticia4.php">ler noticia</a>
                </div>

                <div class="carousel-item">
                    <img src="../../imgs/noticia5.jpg" alt="">
                    <div class="desc-noticia-cont">
                        <h3>Conferência do Meio Ambiente debate ‘desafios’ da sustentabilidade em Santana de Parnaíba</h3>
                        <p> 
                            No dia 28 de maio, a Prefeitura de Santana de Parnaíba promoveu sua 1ª Conferência Municipal do Meio Ambiente
                        </p>
                    </div>

                    <a href="html/noticia5.php">ler noticia</a>
                </div>
            </div>
          </div>
        
          <div class="button-container"> 
            <button class="carousel-button" onclick="navigate('prev')">Anterior</button>
            <button class="carousel-button" onclick="navigate('next')">Próximo</button>
        </div>

        
    </div>
    
    <div id="rodape-cont">
        <div class="rodape-icon">
            <img src="../../imgs/logobranca2.png" alt="">
            <p>© 2023 DIOMAPS, Inc.</p>
        </div>
        <ul class="rodape-menu">
            <li class="titulo">Menu</li>
            <li><a href="html/blog.php">Blog</a></li>
            <li><a href="localizar_user.php">Encontrar posto</a></li>
            <li><a href="editar.php">Gerenciar posto</a></li>
            <li><a href="../../pdf.pdf">Horararios de coleta</a></li>
        </ul>
        <ul class="rodape-contatos">
            <li class="titulo">Contatos</li>
            <li><a href="https://wa.me/5511994167405">Whattsapp</a></li>
            <li><a href="https://www.facebook.com/PrefeituraSantanadeParnaiba">Facebook</a></li>
            <li><a href="https://twitter.com/santana_parnaib">Twitter</a></li>
            <li><a href="https://www.instagram.com/prefeiturasantanadeparnaiba/?hl=en">instagram</a></li>
        </ul>
    </div>
 </div>

    <script>     
    
        const carousel = document.getElementById('carousel');
        let currentIndex = 0;
        let autoplayInterval;
    
        function startAutoplay() {
          autoplayInterval = setInterval(() => navigate('next'), 5000); // Avança a cada 2 segundos
        }
    
        function stopAutoplay() {
          clearInterval(autoplayInterval);
        }
    
        function navigate(direction) {
          const itemsToShow = getItemsToShow();
          if (direction === 'next') {
            currentIndex = (currentIndex + 1) % (carousel.children.length - itemsToShow + 1);
          } else if (direction === 'prev') {
            currentIndex = (currentIndex - 1 + carousel.children.length - itemsToShow + 1) % (carousel.children.length - itemsToShow + 1);
          }
          updateCarousel();
        }
    
        function getItemsToShow() {
          if (window.innerWidth <= 400) {
            return 1;
          } else if (window.innerWidth <= 600) {
            return 2;
          } else {
            return 3;
          }
        }
    
        function updateCarousel() {
          const itemsToShow = getItemsToShow();
          const translateValue = -currentIndex * (100 / itemsToShow) + '%';
          carousel.style.transform = `translateX(${translateValue})`;
        }
    
        // Inicia o autoplay ao carregar a página
        startAutoplay();
    
        // Pára o autoplay quando o usuário interage com os botões de navegação
        document.querySelectorAll('.carousel-button').forEach(button => {
          button.addEventListener('click', stopAutoplay);
        });


        function activateCard(button) {
        var flipCard = button.nextElementSibling; // Encontrar o flip card irmão do botão
        
        // Adicionar/remover classe para ativar o flip card
        flipCard.classList.toggle('active');
    }

    function toggleMenu() {
      var menu = document.querySelector('.menu > ul');
      menu.classList.toggle('active');

      var closeIcon = document.querySelector('.menu .close-icon');
      closeIcon.style.display = (menu.classList.contains('active')) ? 'block' : 'none';

      var servicosLi = document.querySelector('.menu li.has-submenu');
      if (servicosLi) servicosLi.classList.remove('submenu-open');
    }

    (function () {
      const toggle = document.getElementById('servicosToggle');
      if (!toggle) return;

      const li = toggle.closest('li.has-submenu');
      if (!li) return;

      toggle.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        li.classList.toggle('submenu-open');
      });

      const submenu = li.querySelector('.submenu');
      if (submenu) submenu.addEventListener('click', (e) => e.stopPropagation());

      document.addEventListener('click', function () {
        li.classList.remove('submenu-open');
      });
    })();

    (function () {
      const toggle = document.getElementById('userToggle');
      if (!toggle) return;

      const li = toggle.closest('li.has-submenu');
      if (!li) return;

      toggle.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        li.classList.toggle('submenu-open');
      });

      const submenu = li.querySelector('.submenu');
      if (submenu) submenu.addEventListener('click', (e) => e.stopPropagation());

      document.addEventListener('click', function () {
        li.classList.remove('submenu-open');
      });
    })();
    
      </script>

</body>
</html>