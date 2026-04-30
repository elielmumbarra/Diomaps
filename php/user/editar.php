<?php 
session_start();
// Saída e processamento em UTF-8
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');
require "conexao.php";
if(!isset($_SESSION))
if(!isset($_SESSION['usuario'])){



    die("volta e loga direito");

}




$id = $_SESSION['usuario'];

$sql_query = $conexao->query("SELECT * FROM usuario WHERE id = '$id'") or die ($conexao->error);

$usuario = $sql_query->fetch_assoc();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  submit();
} 
// Função que você deseja executar
function submit() {

require "conexao.php";

$id = $_SESSION['usuario'];

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $cep = $_POST['cep'];
  $bairro = $_POST['bairro'];
  $telefone = $_POST['telefone'];
  $lixo = $_POST['tipo_lixo'];
  $rua = $_POST['rua'];

  $stmt = $conexao->prepare("UPDATE usuario SET nome= ?, email= ?, senha= ?, cep= ?, endereco= ?, bairro= ?, telefone= ? ,lixo= ? WHERE id = ?");
  $stmt->bind_param ("ssssssssi", $nome, $email, $senha ,$cep, $rua, $bairro, $telefone , $lixo , $id);
  
  if ($stmt->execute()) {

      echo "
      <div id='aviso'>
      <img src='../../imgs/certo.gif'>
       Seu posto foi editado com sucesso
       <button onclick='aviso()'> Fechar </button>
      </div>

      <script>
      
      function aviso() {
        
    var minhaDiv = document.getElementById('aviso');

    minhaDiv.style.display = 'none';


    location.href = 'editar.php';
      }

      </script>


      ";
  } else {
      echo "Erro ao atualizar informações do usuário: " . $stmt->error;
  }
}





?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    <link rel="stylesheet" href="../../css/edit.css">
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
        <h1><a href="index.php"> < DIOMAPS </a></h1>
        <nav>
            <div class="menu-icon" onclick="toggleMenu()">
                <img id="imgmenu" src="../../imgs/menu-branco.png">
            </div>
            <ul>
                <div class="close-icon" onclick="toggleMenu()">
                <img id="imgmenu" src="../../imgs/close-branco.png">
                </div>
                <li><a href="../index.html?#iniciio-cont">Inicio</a></li>
                <li><a href="../index.html?#func-cont">Serviços</a></li>
                <li><a href="../index.html?#rodape-cont">Contato</a></li>
                <li><a href="../php/login.php">Login</a></li>
                <li class="usermenu"><i class="fa-solid fa-user"></i>&nbsp<b><?php echo $usuario['nome'];  ?></b> <ul><li><a href="">Sair <img src="../../imgs/sairbranco.png" alt="" class="sairb"> <img src="../../imgs/sair.png" alt="" class="sairv"></a></li><li><a href="">Editar perfil </a></li></ul></li>
            </ul>
    
        </nav>
    </div>

    <div id="container-geral">
        <h2><img src='../../imgs/user.png'>Editar <?php  echo $usuario['nome'];?></h2>

        <?php
        echo "

          <div class='infos'>

            <p><b>Email:</b> " . $usuario['email']  . "</P>
            <p><b>CEP:</b> " . $usuario['cep']  . "</P>
            <p><b>Endereço:</b> " . $usuario['endereco']  . " </P>
            <p><b>Telefone:</b> " . $usuario['telefone']  . "</P>

          </div>  
              
          
        ";



        ?>
        <form method="post">

          <div class="flex-cont">
            <?php
            require "conexao.php";
            ?>
                    

            <label for='nome'>Nome:</label>
            <input type='text' name='nome' placeholdder="hghghgh" required>
              
            <label for='email'>Email:</label>
            <input type='email' name='email'placeholdder="$usuario['email']" required>
              
            <label for='senha'>Senha:</label>
            <input type='password' name='senha' required>
            
            <label for='cep'>CEP:</label>
            <input type='text' name='cep' placeholdder="$usuario['cep']" required>

            <label for='rua'>Rua:</label>
            <input type='text' name='rua' placeholder="<?php echo $usuario['endereco']; ?>" required>
          </div>

          <div class="flex-cont">
  
            <label for='bairro'>Bairro:</label>
            <select name='bairro' placeholdder="$usuario['bairro'] "required>
              <option value='' disabled selected>Selecione um bairro</option>";
              <?php

                $result = $conexao->query("SELECT * FROM bairros");
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='{$row['idbairro']}'>{$row['nome']}</option>";
                }
              ?>
            </select>
            
            <label for='telefone'>Telefone:</label>
            <input type='tel' name='telefone' placeholdder="$usuario['telefone']" required>
    
            <label for='tipo_lixo'>Tipo de Lixo:</label>
            <select name='tipo_lixo' placeholdder="$usuario['lixo']" required>
              <option value='' disabled selected>Selecione um tipo de lixo</option>";
              <?php
                $result = $conexao->query("SELECT * FROM tiposdelixo");
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='{$row['id']}'>{$row['nome']}</option>";
              }
              ?>
            </select>

          </div>

          

          <button type='submit' class="edit-button"> Alterar</button>
        </form>

        <div class="form-sair">
          <button id="delete" onclick="avisodel()">Excluir conta</button>

        <a href="destruir_sessão.php">Sair  <img src="../../imgs/sairbranco.png" alt=""></a>

        </div>
    </div>


    <div id="avisodelete">
    <img src='../../imgs/excluir-user.png'>
    Tem certeza que deseja apagar sua conta? 
    <button onclick="deletar()" style="background:#FA5252;">Apagar</button>
       <button onclick='fechar()'> Não apagar </button>
    </div>


    <script>
          function avisodel() {
        document.getElementById('avisodelete').style.display = 'flex';
      }
      
      function fechar() {
        
        document.getElementById('avisodelete').style.display = 'none';

      }

      function deletar(){
        location.href = 'delete.php';
      }

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