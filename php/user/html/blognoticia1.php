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
    <link rel="stylesheet" href="../../../css/styleblognoticia.css">
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
            <h1>Compostagem: o que é, como fazer e benefícios na reciclagem</h1>
        </div>
   
        <div class="lide">
            <p>A compostagem pode reduzir a dependência de fertilizantes químicos e ajudar a gerar renda extra ao agricultor, além de trazer benefícios ambientais 
            <br> </br>
            <b>Por Eliel Santos, Oeste de São Paulo</b> — Santana de Parnaíba
            <br>
            publicado: 28/11/2023 14:03.</p>
            <br>
            <hr>
        </div>
   
        <div class="etec">
            <div class="textoimg">
                <p>A fazenda fornece um material diversificado para a compostagem. (Fonte: Getty Images/Reprodução)</p>
            </div>
        </div>
   
        <div class="noticia">
            <p>
            A compostagem é um processo natural de decomposição da matéria orgânica, como restos de alimentos, folhas, galhos, estercos de animais e outros resíduos vegetais e animais. Essa decomposição é realizada por microrganismos, como bactérias, fungos e minhocas, em condições adequadas de umidade, oxigênio e temperatura.<br> <br>
            Nesse processo de reciclagem, os microrganismos quebram a matéria orgânica em compostos mais simples, transformando-a em um produto final chamado de composto orgânico ou adubo orgânico. Esse material é rico em nutrientes, como nitrogênio, fósforo, potássio e outros minerais essenciais para o crescimento saudável das plantas. <br> <br>
            O composto resultante da compostagem pode ser utilizado como adubo em hortas, jardins, pomares e cultivos agrícolas, melhorando a fertilidade do solo, aumentando sua capacidade de retenção de água e nutrientes, estimulando o desenvolvimento das raízes das plantas e promovendo o equilíbrio biológico do ecossistema. <br> <br>
            A compostagem pode ser realizada em pequenas composteiras domésticas, na fazenda ou até em sistemas industriais. Ela contribui para a redução do volume de resíduos orgânicos destinados a aterros sanitários, além de evitar a emissão de gases de efeito estufa associados à decomposição anaeróbica dos resíduos. <br> <br>
            Cada sistema de compostagem pode ter suas particularidades, mas esses passos básicos ajudam a guiar o processo. O produtor deve estar atento a qualidade dos materiais utilizados, a umidade e ao manejo adequado da composteira para obter os melhores resultados.<br> <br>
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