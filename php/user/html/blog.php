<?php
session_start();
require "conexao.php";
if(!isset($_SESSION))
if(!isset($_SESSION['usuario'])){

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../../../css/blog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../../js/menu.js"></script>
    <script src="https://kit.fontawesome.com/1de1480218.js" crossorigin="anonymous"></script>

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

    
 <div class="menu">
    <h1><a href="../index.php"> < DIOMAPS </a></h1>
    <nav>
        <div class="menu-icon" onclick="toggleMenu()">
            <img id="imgmenu" src="../../../imgs/menu.png">
        </div>
        <ul>
            <div class="close-icon" onclick="toggleMenu()">
            <img id="imgmenu" src="../../../imgs/close-branco.png">
            </div>

            <li><a href="../index.php?#inicio-cont">Inicio</a></li>
            <li><a href="../index.php?#func-cont">Serviços</a></li>
            <li><a href="../index.php?#rodape-cont">Contato</a></li>
            <li class="usermenu"><i class="fa-solid fa-user"></i>&nbsp<b><?php echo $usuario['nome'];  ?></b> <ul><li><a href="destruir_sessão.php">Sair <img src="../../../imgs/sairbranco.png" alt="" class="sairb"> <img src="../../../imgs/sair.png" alt="" class="sairv"></a></li><li><a href="../editar.php">Editar perfil </a></li></ul></li>

        </ul>

    </nav>

 </div>


 <section class="containerproje">
    <div class="slide-container active">
        <div class="slide">
         <div class="contentproje">
           <h3>Compostagem: o que é, <br> como fazer e benefícios <br> na reciclagem</h3>
           <p>A compostagem pode reduzir a dependência de fertilizantes químicos e ajudar a gerar renda extra ao agricultor, além de trazer benefícios ambientais</p>
           <a href="blognoticia1.php" class="bntproj">Saiba mais</a>
         </div>
        </div>
    </div>

    <div class="slide-container">
        <div class="slide">
         <div class="contentproje">
           <h3>Sustentabilidade</h3>
           <p>
Sustentabilidade refere-se à capacidade de manter, preservar e equilibrar recursos naturais, sociais e econômicos a longo prazo.</p>
           <a href="blognoticia2.php" class="bntproj">Saiba mais</a>
         </div>
        </div>
    </div>
    
    <div class="slide-container">
        <div class="slide">
         <div class="contentproje">
           <h3>Reciclagem: o que é e qual a importância?</h3>
           <p>A reciclagem, assim como o tratamento dado ao lixo, é mais antiga do que você pode imaginar. Entenda</p>
           <a href="blognoticia3.php" class="bntproj">Saiba mais</a>
         </div>
        </div>
    </div>

    <div id="prev" onclick="prev()"> < </div>
    <div id="next" onclick="next()"> > </div>
</section>


<div id="container-geral">

    <div class="noticia-cont">
        <div class="noticia">
            <div class="desc">
                <a href="blognoticia4.php">
                <h2>5 maneiras de reduzir a poluição ambiental</h2>
                <p>A poluição é um grande problema que está lentamente destruindo o mundo que nós vivemos. É vital para cada indivíduo fazer o que pode para limpar e agredir o menos possível o ambiente. Todos nós temos que fazer o possível e não medir esforços para que no futuro a natureza seja menos agredida.</p>
            </a></div>
            <img src="../../../imgs/blog4.jpg" alt="imagem">
        </div>

        <div class="noticia">
            <div class="desc">
                <a href="blognoticia5.php">
                <h2>Ideias Criativas para Reutilizar Utensílios Descartáveis</h2>
                <p>O descarte excessivo de utensílios descartáveis, como copos plásticos, pratos e colheres, é um problema ambiental significativo. No entanto, com um pouco de criatividade e imaginação, é possível encontrar novos usos para esses itens antes de descartá-los. Neste artigo, apresentaremos algumas ideias inovadoras para reutilizar utensílios descartáveis, ajudando a reduzir o impacto negativo no meio ambiente.</p>
            </a></div>
            <img src="../../../imgs/blog5.jpg" alt="imagem">
        </div>

        <div class="noticia">
            <div class="desc">
                <a href="blognoticia6.php">
                <h2>Como descartar o óleo de cozinha?</h2>
                <p>O óleo de cozinha usado pode parecer inocente, mas é um grande contaminante.</p>
           </a></div>
            <img src="../../../imgs/blog6.jpg" alt="imagem">
        </div>
    </div>

</div>

<script>
      let slides = document.querySelectorAll('.slide-container');
let index = 0;

function next(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

setInterval(next, 7000);

function toggleMenu() {
    var menu = document.querySelector('.menu ul');
    menu.classList.toggle('active');

    var closeIcon = document.querySelector('.menu .close-icon');
    closeIcon.style.display = (menu.classList.contains('active')) ? 'block' : 'none';
   }
    </script>


</body>
</html>