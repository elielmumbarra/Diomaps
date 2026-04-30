<?php
require __DIR__ . "/../bootstrap.php";

// PDO padronizado (utf8mb4)
$pdo = diomaps_pdo();

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
    <link rel="stylesheet" href="../../css/localizar.css">
    <script src="https://kit.fontawesome.com/1de1480218.js" crossorigin="anonymous"></script>
    <title>Localizar</title>
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
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?#func-cont">Serviços</a></li>
                <li><a href="index.php?#rodape-cont">Contato</a></li>

                <!-- FIX paths: editar.php está na mesma pasta; imgs é ../../imgs -->
                <li class="usermenu">
                    <i class="fa-solid fa-user"></i>&nbsp<b><?php echo $usuario['nome']; ?></b>
                    <ul>
                        <li>
                            <a href="destruir_sessão.php">
                                Sair
                                <img src="../../imgs/sairbranco.png" alt="" class="sairb">
                                <img src="../../imgs/sair.png" alt="" class="sairv">
                            </a>
                        </li>
                        <li><a href="editar.php">Editar perfil</a></li>
                    </ul>
                </li>
            </ul>
    
        </nav>
    </div>

    <div class="nav-pesquisa">
        <form  method="POST" action="" class="pesq-title-cont">
                <label for="pesq">
                <input type="text" name="nome_usuario" id="nome_usuario" placeholder="Digite seu bairro ou nome do posto"
                    value="<?php echo isset($dados['nome_usuario']) ? $dados['nome_usuario'] : ''; ?>">
                <img src="../../imgs/pesq.png" alt="">
                </label>
                
                <details>
                    <summary>Bairro<img src="../../imgs/setabaixo.png" alt=""></summary>
                    <div class="filtro-cont">
                        <ul class="overflow-cont">
                            <?php
                            $query_bairros = "SELECT idbairro, nome FROM bairros";
                            $result_bairros = $pdo->query($query_bairros);
                            while ($row_bairro = $result_bairros->fetch(PDO::FETCH_ASSOC)) {
                                $isChecked = isset($dados['bairros']) && in_array($row_bairro['idbairro'], $dados['bairros']) ? 'checked' : '';
                                echo "<label for='bairro_" . $row_bairro['idbairro'] . "'>" . $row_bairro['nome'] . "<input type='checkbox' name='bairros[]' value='" . $row_bairro['idbairro'] . "' id='bairro_" . $row_bairro['idbairro'] . "' $isChecked></label>";
                            }
                            ?>
                        </ul>
                    </div>
                </details>

                <ul class="tipo-lixo">
                    <li><b>Tipos de lixo:</b></li>
                    <?php
                    $query_tipos_lixo = "SELECT id, nome FROM tiposdelixo";
                    $result_tipos_lixo = $pdo->query($query_tipos_lixo);
                    while ($row_tipo_lixo = $result_tipos_lixo->fetch(PDO::FETCH_ASSOC)) {
                        $isChecked = isset($dados['tipos_lixo']) && in_array($row_tipo_lixo['id'], $dados['tipos_lixo']) ? 'checked' : '';
                        echo "<li><label for='tipo_" . $row_tipo_lixo['id'] . "'>" . $row_tipo_lixo['nome'] . "<input type='checkbox' name='tipos_lixo[]' value='" . $row_tipo_lixo['id'] . "' id='tipo_" . $row_tipo_lixo['id'] . "' $isChecked></label></li>";
                    }
                    ?>
                </ul>
                <input type="submit" name="pesqUsuario" id="pesqUsuario" value="enviar" class="filtro-button">
            
        </form>
    </div>




    <div id="container-geral">
        <section>
            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['pesqUsuario'])) {
                $nome = "%" . $dados['nome_usuario'] . "%";
                $query_usuario = "SELECT `id`, `nome`, `cep`, `endereco`, `bairro`, `telefone`, `imagem`, `lixo`, `nivel` FROM `usuario` WHERE `nome` LIKE :nome";
                
                if (!empty($dados['bairros'])) {
                    $query_usuario .= " AND bairro IN (" . implode(",", $dados['bairros']) . ")";
                }

                if (!empty($dados['tipos_lixo'])) {
                    $query_usuario .= " AND lixo IN (" . implode(",", $dados['tipos_lixo']) . ")";
                }

                $query_usuario .= " ORDER BY id ASC";

                $result_usuarios = $pdo->prepare($query_usuario);
                $result_usuarios->bindParam(':nome', $nome, PDO::PARAM_STR);
                $result_usuarios->execute();

                if ($result_usuarios->rowCount() > 0) {
                    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {


                        extract($row_usuario);

                        if( $row_usuario['nivel'] != 'adm' ){
                            echo "
                            <div class='Container-roupas' > 
                                <ion-icon name='location'></ion-icon>
                                <img src='../../imgs/caixasrecicl.jpg' alt='Imagem do usuário'>
                                <p>" . $row_usuario['nome'] . "</p>
                                <h4> Telefone: " . $row_usuario['telefone'] . "</h4>
                                <h4> Endereço: " . $row_usuario['endereco'] . "</h4>
                                <a class='button-posto'  href='https://www.google.com/maps/search/ " .$row_usuario['cep']." ".$row_usuario['endereco']." ' target='_blank' >Ver no mapa</a>
                            </div>
                            
                            ";
                        } 
                        
                        elseif ($row_usuario['nivel'] == 'adm') {

                        }


                } 
            }

            if ($result_usuarios->rowCount() == 0) {

                echo"Nenhum posto encontrado";

            }
        }
            ?>
        </section>
    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
