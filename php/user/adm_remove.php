<?php 
session_start();
require "conexao_pdo.php";
if(!isset($_SESSION))
session_start();
if(!isset($_SESSION['usuario'])){

    die("<a href='../login.php'>Volta e loga direito<a>");
}

?>


<?php
require "conexao.php";

$id = $_SESSION['usuario'];

$sql_query = $conexao->query("SELECT * FROM usuario WHERE id = '$id'") or die ($conexao->error);

$usuario = $sql_query->fetch_assoc();

if($usuario['nivel'] != 'adm'){

    die("<div style='width:100%; display:flex; Justify-content:center; align-items:center;'><a href='index.php'><h2>Pagina restrita apenas para administradores</h2><a></div>");

}
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

    <div class="menu">
        <h1> <a href="../../index.html"> < DIOMAPS </a></h1> 
        <nav>
            <div class="logo"></div>
            <ul>
                <li><a href="index.php">Sair</a></li>
            </ul>
            <div class="menu-icon">
                <img id="imgmenu" src="../../imgs/menu.png">
            </div>
        </nav>
    </div>

    <script src="script.js"></script>

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
                            require "conexao_pdo.php";
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
        <form method="post" action="remover.php" id="formlogin" name="formlogin">
            <label for="id">Remover usuario: 
            <input type="text" name="id" id="id"/></td>
            <input name="submit" type="submit" value="X"/>
            </label>
        </form>
    </div>




    <div id="container-geral">
        <section>
            <?php
            require "conexao_pdo.php";
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['pesqUsuario'])) {
                $nome = "%" . $dados['nome_usuario'] . "%";
                $query_usuario = "SELECT id, nome, bairro, endereço, telefone, lixo, cep, nivel FROM usuario WHERE nome LIKE :nome";
                
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
                                <h4> ID: " . $row_usuario['id'] . "</h4>
                                <h4> Telefone: " . $row_usuario['telefone'] . "</h4>
                                <h4> Endereço: " . $row_usuario['endereço'] . "</h4>
                                <a class='button-posto'  href='https://www.google.com/maps/search/ " .$row_usuario['cep']." ".$row_usuario['endereço']." ' target='_blank' >Ver no mapa</a>
                            </div>
                            
                            ";
                        } 
                        
                        elseif ($row_usuario['nivel'] = 'adm') {

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
    <script src="../../js/script.js"></script>
</body>
</html>
