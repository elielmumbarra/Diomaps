<?php
session_start();

// Saída e processamento em UTF-8
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');

require "conexao.php";

// Garante utf8mb4 na conexão MySQLi
if (isset($conexao) && method_exists($conexao, 'set_charset')) {
    $conexao->set_charset('utf8mb4');
} else {
    // Fallback, se necessário
    $conexao->query("SET NAMES 'utf8mb4'");
    $conexao->query("SET CHARACTER SET 'utf8mb4'");
    $conexao->query("SET collation_connection = 'utf8mb4_unicode_ci'");
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM usuario WHERE email = '$email'";
    $sql_exec = $conexao->query($sql_code) or die($conexao->error);

    // Verifica se encontrou algum usuário com o email fornecido
    if ($sql_exec->num_rows > 0) {
        $usuario = $sql_exec->fetch_assoc();

        // Verifica a senha usando password_verify
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = $usuario['id'];
            $id = $_SESSION['usuario'];
            $sql_query = $conexao->query("SELECT * FROM usuario WHERE id = '$id'") or die($conexao->error);
            $usuario = $sql_query->fetch_assoc();

            if ($usuario['nivel'] != 'adm') {
                header('location:user/index.php');
            } elseif ($usuario['nivel'] == 'adm') {
                header('location:user/adm_remove.php');
            }
        } else {
            echo "
            <div id='aviso2'>
                <img src='../imgs/errocad.png'>
                Errou a senha
                <button onclick='aviso()'> Fechar </button>
            </div>
  
            <script>
                function aviso() {
                    var minhaDiv = document.getElementById('aviso2');
                    minhaDiv.style.display = 'none';
                }
            </script>
            ";
        }
    } else {
        echo "
        <div id='aviso2'>
            <img src='../imgs/errocad.png'>
            Errou o email
            <button onclick='aviso()'> Fechar </button>
        </div>

        <script>
            function aviso() {
                var minhaDiv = document.getElementById('aviso2');
                minhaDiv.style.display = 'none';
            }
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/cad.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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

<div class="cont-flex">
    <div class="cont-sair">
        <h1><a href="../index.html">< DIOMAPS</a></h1>
        <p>Cadastre seu posto de coleta, Amplie a visibilidade do seu trabalho e contribua para um mundo mais sustentável!</p>
        <p class="b"><b>LOGIN NECESSÁRIO APENAS PARA POSTOS DE COLETA!</b></p>
    </div>

    <form class="mostrarsenha1" action="" method="post">
        <h2><img src='../imgs/user.png'>Login</h2>
        <label for='email'>Email:</label>
        <input type='email' name='email' >

        <label for='senha'>Senha:</label>
        <input type='password' name='senha' id="campoSenha" name="campoSenha">
        <i class="bi bi-eye-fill" id="mostrarsenha" onclick="mostrarsenha()"></i>
            
        <p>Não tem uma conta? <a href='etapa.php'>Cadastre-se</a></p>

        <button type='submit'>Entrar</button>
    </form>

</div>
    <div class="gtranslate_wrapper"></div>       
        <script>window.gtranslateSettings = {"default_language":"pt","native_language_names":true,"detect_browser_language":true,"languages":["pt","en","es","ht","fr","zh-CN","de","ru","ar"],"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","alt_flags":{"pt":"brazil"}}</script>
        <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

        <script>
function mostrarsenha(){
  var inputPass = document.getElementById('campoSenha')
  var btnShowPass = document.getElementById('mostrarsenha')

  if(inputPass.type === 'password'){
    inputPass.setAttribute('type', 'text')
    btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill')
  }else{
    inputPass.setAttribute('type', 'password')
    btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill')
  }
}
    </script>
    
</body>
</html>