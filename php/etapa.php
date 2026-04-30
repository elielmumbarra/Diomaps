<?php
// Converte toda a saída para UTF-8 se o arquivo estiver em ISO-8859-1/Windows-1252
// ob_start(function ($buffer) {
//     $enc = mb_detect_encoding($buffer, ['UTF-8', 'ISO-8859-1', 'Windows-1252'], true);
//     if ($enc && $enc !== 'UTF-8') {
//         // Converte para UTF-8 preservando caracteres quando possível
//         $converted = iconv($enc, 'UTF-8//TRANSLIT', $buffer);
//         return $converted !== false ? $converted : $buffer;
//     }
//     return $buffer;
// });

// Força processamento e saída em UTF-8
require __DIR__ . "/bootstrap.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/cad.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <title>Formulário de 3 Etapas</title>
</head>
<body>

<div class="gtranslate_wrapper"></div>       
        <script>window.gtranslateSettings = {"default_language":"pt","native_language_names":true,"detect_browser_language":true,"languages":["pt","en","es","ht","fr","zh-CN","de","ru","ar"],"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","alt_flags":{"pt":"brazil"}}</script>
        <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>


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
  
  <p>Cadastre seu posto de coleta, Amplie a visIbilidade do seu trabalho e contribua para um mundo mais sustentável!</p>
  <p class='b'><b>CADASTRO NECESSÁRIO APENAS PARA POSTOS DE COLETA!</b></p>
</div>

<?php
// REMOVER: require "conexao.php"; (bootstrap já inclui)
// REMOVER: bloco manual de set_charset (conexao.php já seta utf8mb4)

// Trata o POST (etapas) e, ao final, sempre inclui o form.php para GET
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Etapa 1
    if (isset($_POST["etapa1"])) {
        $_SESSION["nome"]  = $_POST["nome"]  ?? '';
        $_SESSION["email"] = $_POST["email"] ?? '';
        $_SESSION["senha"] = password_hash($_POST["senha"] ?? '', PASSWORD_DEFAULT);

        // Verificação de e-mail usando prepared statement
        if ($stmt = $conexao->prepare("SELECT id FROM usuario WHERE email = ?")) {
            $stmt->bind_param("s", $_SESSION["email"]);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "
                    <div id='aviso'>
                        <img src='../imgs/erroemail.png'>
                        Este email já está em uso. Por favor, escolha outro.
                        <button onclick='aviso()'> Voltar </button>
                    </div>
                    <script>
                        function aviso() { location.href = 'etapa.php'; }
                    </script>
                ";
                $stmt->close();
                exit; // impede renderização extra
            }
            $stmt->close();
        }

        echo "<script>window.location.href='etapa.php?etapa=2';</script>";
        exit; // impede renderização extra
    }

    // Etapa 2
    if (isset($_POST["etapa2"])) {
        $_SESSION["cep"]       = $_POST["cep"] ?? '';
        // Salva sem acento e mantém compatibilidade
        $_SESSION["endereco"]  = $_POST["endereco"] ?? '';
        $_SESSION["bairro"]    = $_POST["bairro"] ?? '';
        echo "<script>window.location.href='etapa.php?etapa=3';</script>";
        exit; // impede renderização extra
    }

    // Etapa 3
    if (isset($_POST["etapa3"])) {
        $_SESSION["telefone"]  = $_POST["telefone"]   ?? '';
        $_SESSION["tipo_lixo"] = $_POST["tipo_lixo"]  ?? '';

        $nome      = $_SESSION['nome']      ?? '';
        $email     = $_SESSION['email']     ?? '';
        $senhaHash = $_SESSION['senha']     ?? '';
        $cep       = $_SESSION['cep']       ?? '';
        $endereco  = $_SESSION['endereco']  ?? '';
        $bairroId  = (int)($_SESSION['bairro'] ?? 0);
        $telefone  = $_SESSION['telefone']  ?? '';
        $lixoId    = (int)($_SESSION['tipo_lixo'] ?? 0);

        $stmt = $conexao->prepare(
            "INSERT INTO usuario (nome, email, senha, cep, endereco, bairro, telefone, lixo)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );
        if (!$stmt) { die('Prepare failed: ' . $conexao->error); }

        $stmt->bind_param("sssssisi", $nome, $email, $senhaHash, $cep, $endereco, $bairroId, $telefone, $lixoId);
        $stmt->execute();
        $_SESSION['usuario'] = $conexao->insert_id;
        $stmt->close();

        if ($stmt = $conexao->prepare("SELECT nivel FROM usuario WHERE id = ?")) {
            $stmt->bind_param("i", $_SESSION['usuario']);
            $stmt->execute();
            $stmt->bind_result($nivel);
            $stmt->fetch();
            $stmt->close();

            if ($nivel !== 'adm') {
                echo "<script>window.location.href='user/index.php';</script>";
                exit;
            } else {
                echo "<script>window.location.href='adm/index.php';</script>";
                exit;
            }
        }

        echo "<script>window.location.href='user/index.php';</script>";
        exit;
    }
}

// Sempre exibe o formulário em GET (ou quando não houve match de etapa no POST)
include 'form.php';
$conexao->close();

// Finaliza o buffer e envia a saída já convertida
// ob_end_flush();
?>
</div>

</body>
</html>