<?php
        $conexao = new mysqli("localhost", "root", "", "diomaps");
        // Verifique a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        } 
?>
