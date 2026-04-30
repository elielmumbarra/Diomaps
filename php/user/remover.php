<?php
session_start();
require('conexao_pdo.php');


$mensagem="usuario não existe";
$id = $_POST['id'];
try {
    $stmt = $pdo->prepare('DELETE FROM `usuario` WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
        echo"Posto apagado <a href='adm_remove.php'>Voltar<a>";
    } else {
        echo "$mensagem <a href='adm_remove.php'>Voltar<a>"  ;
    }
} catch (PDOException $e) {
    echo 'Erro :' . $e->getMessage();
}
?>