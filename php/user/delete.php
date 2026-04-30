<?php 
session_start();
require "conexao.php";
if(!isset($_SESSION))
if(!isset($_SESSION['usuario'])){
    die("volta e loga direito");
}




$id = $_SESSION['usuario'];

$sql_query = $conexao->query("DELETE FROM usuario WHERE id = '$id'") or die ($conexao->error);

if ($sql_query) {
    header("Location: ../../index.html");
} else {
    echo "Erro ao excluir registro: " . $conexao->error;
}


