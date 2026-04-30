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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>noticia</title>
    <link rel="icon" type="image/x-icon" href="../../../imgs/g1favicon.jpg">
    <link rel="stylesheet" href="../../../css/stylenoticia3.css">
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
                <img id="imgmenu" src="../../../imgs/close-branco.png"">
                </div>
                <li><a href="../index.php?#inicio-cont">Inicio</a></li>
            <li><a href="../index.php?#func-cont">Serviços</a></li>
            <li><a href="../index.php?#rodape-cont">Contato</a></li>
            <li class="usermenu"><i class="fa-solid fa-user"></i>&nbsp<b><?php echo $usuario['nome'];  ?></b> <ul><li><a href="destruir_sessão.php">Sair <img src="../../../imgs/sairbranco.png" alt="" class="sairb"> <img src="../../../imgs/sair.png" alt="" class="sairv"></a></li><li><a href="../editar.php">Editar perfil </a></li></ul></li>
            </ul>
    
        </nav>
     
    </div>

 </div>
 <div id="contnoticia">
    <div class="noticia-flex">
        <div class="propaganda">
            <br>
            <img src="../../../imgs/gifnoticia (1).gif" alt="">
        </div>
   
        <div class="titulo">
            <h1>Prefeito de Santana de Parnaíba, Marcos Tonho, se reúne com Sabesp para discutir planejamento de 2023</h1>
        </div>
   
        <div class="lide">
            <p>Na manhã do dia 27 de fevereiro, aconteceu na prefeitura de Santana de Parnaíba o encontro entre a equipe da Sabesp
            <br> </br>
            <b>Por Eliel Santos, Oeste de São Paulo</b> — Santana de Parnaíba
            <br>
            publicado: 25/11/2023 22:22.</p>
            <br>
            <hr>
        </div>
   
        <div class="etec">
            <div class="textoimg">
                <p>Unidade de Negócios Oeste (Sabesp MO), o prefeito Marcos Tonho e os secretários municipais das pastas de meio ambiente e planejamento e da casa civil.</p>
            </div>
        </div>
   
        <div class="noticia">
            <p>
            Na manhã do dia 27 de fevereiro, aconteceu na prefeitura de Santana de Parnaíba o encontro entre a equipe da Sabesp – Unidade de Negócios Oeste (Sabesp MO), o prefeito Marcos Tonho e os secretários municipais das pastas de meio ambiente e planejamento e da casa civil. Na reunião a empresa prestou contas sobre os serviços realizados na cidade no ano passado e ainda foram definidas as metas a serem atingidas em 2023.<br> <br>
            Dentre os assuntos abordados, Debora Pierini Longo, superintendente da Sabesp MO, destacou a implementação cada vez mais intrínseca da agenda ESG nos serviços prestados pela empresa no município, além da importância de desenvolver planejamentos que tenham como prioridade a viabilidade econômica e o atendimento das principais necessidades dos moradores de Santana de Parnaíba.<br> <br>
            Atualmente, o município conta com uma estrutura de tratamento de água e esgoto, fornecida pela Sabesp, e até o final do contrato haverá investimentos da ordem de mais de R$ 100 milhões. Uma das principais conquistas do ano passado para o município foi o aumento de 14% no tratamento de esgoto produzido pela cidade, passando de 51% em 2020 para 65% em 2022. <br> <br>
            “Implementamos um plano de fiscalização e pudemos notar que a maior parte das metas que colocamos no contrato com a Sabesp foram realizadas ao longo do ano passado, o que foi muito positivo para o município. Esperamos que essa reunião apenas reforce essa relação de parceria com o objetivo de expandir cada vez mais os serviços de água e esgoto na cidade, atendendo assim às demandas da população”, comenta Veruska Carvalho, Secretária de Meio Ambiente e Planejamento. <br> <br>
                <hr>
                <br>
        </div>
    </div>

    <div id="rodape-cont">
        <div class="rodape-icon">
            <img src="../../../imgs/logobranca2.png" alt="">
            <p>© 2023 DIOMAPS, Inc.</p>
        </div>
        <ul class="rodape-menu">
            <li class="titulo">Menu</li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="../localizar_user.php">Encontrar posto</a></li>
            <li><a href="../editar.php">Gerenciar posto</a></li>
            <li><a href="../../../pdf.pdf">Horararios de coleta</a></li>
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
    
</body>
</html>