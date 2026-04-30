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
    <link rel="stylesheet" href="../../../css/styleblognoticia2.css">
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
        <h1><a href="blog.php"> < DIOMAPS </a></h1>
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
            <h1>Sustentabilidade: conceitos, definições e exemplos</h1>
        </div>
   
        <div class="lide">
            <p>Entenda o que é sustentabilidade e sua importância
            <br> </br>
            <b>Por Eliel Santos, Oeste de São Paulo</b> — Santana de Parnaíba
            <br>
            publicado: 28/11/2023 14:16.</p>
            <br>
            <hr>
        </div>
   
        <div class="etec">
            <div class="textoimg">
                <p>O termo sustentabilidade deriva do latim sustentare, que significa sustentar, defender, favorecer, apoiar, conservar e/ou cuidar.</p>
            </div>
        </div>
   
        <div class="noticia">
            <p>
            O termo sustentabilidade deriva do latim sustentare, que significa sustentar, defender, favorecer, apoiar, conservar e/ou cuidar. O conceito de sustentabilidade vigente teve origem em Estocolmo, na Suécia, na Conferência das Nações Unidas sobre o Meio Ambiente Humano (Unche), que aconteceu entre os dias 5 e 16 de junho de 1972. <br> <br>
            A Conferência de Estocolmo chamou atenção internacional principalmente para as questões relacionadas à degradação ambiental e à poluição. Foi a primeira conferência sobre meio ambiente realizada pela ONU (Organização das Nações Unidas). Os participantes buscavam entender as necessidades do presente do planeta. Além disso, a ONU também criou a Comissão Mundial sobre Meio Ambiente e Desenvolvimento. <br> <br>
            Mais tarde, em 1992, na Conferência sobre Meio Ambiente e Desenvolvimento (Eco-92 ou Rio-92), que aconteceu no Rio de Janeiro, foi consolidado o conceito de desenvolvimento sustentável. Este passou a ser entendido como o desenvolvimento a longo prazo, de maneira que não sejam exauridos os recursos naturais utilizados pela humanidade, tudo isso através de práticas sustentáveis que incentivem a melhora na qualidade de vida das pessoas, dessa ou das próximas gerações. <br> <br>
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