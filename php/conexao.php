<?php
        $DB_HOST = "";
        $DB_USER = "";
        $DB_PASS = "";
        $DB_NAME = "";
        $DB_PORT = 3306;

        $conexao = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

        // Verifique a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        } 
        // Garante UTF-8 completo
        if (method_exists($conexao, 'set_charset')) {
            $conexao->set_charset('utf8mb4');
        } else {
            $conexao->query("SET NAMES 'utf8mb4'");
            $conexao->query("SET CHARACTER SET 'utf8mb4'");
            $conexao->query("SET character_set_results = 'utf8mb4'");
            $conexao->query("SET collation_connection = 'utf8mb4_unicode_ci'");
        }

        // Opcional: migrar banco/tabelas e corrigir dados (execute uma única vez)
        // Segurança: roda apenas em localhost e quando ?migrate_utf8mb4=1 for passado
        if (
            isset($_GET['migrate_utf8mb4']) && $_GET['migrate_utf8mb4'] == '1' &&
            (($_SERVER['REMOTE_ADDR'] ?? '') === '127.0.0.1' || ($_SERVER['REMOTE_ADDR'] ?? '') === '::1')
        ) {
            // Usa o nome do banco configurado
            $conexao->query("ALTER DATABASE `{$DB_NAME}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

            // 2) Tabelas
            $conexao->query("ALTER TABLE usuario CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $conexao->query("ALTER TABLE bairros CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $conexao->query("ALTER TABLE tiposdelixo CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

            // 3) Renomear coluna com acento (ajuste o tipo conforme seu schema)
            // Descomente se sua tabela tiver a coluna `endereço`:
            // $conexao->query("ALTER TABLE usuario CHANGE COLUMN `endereço` `endereco` VARCHAR(255) NOT NULL");

            // 4) Corrigir dados possivelmente gravados em latin1/ANSI
            $conexao->query("UPDATE usuario SET nome = CONVERT(CAST(nome AS BINARY) USING utf8mb4), endereco = CONVERT(CAST(endereco AS BINARY) USING utf8mb4), bairro = CONVERT(CAST(bairro AS BINARY) USING utf8mb4)");
            $conexao->query("UPDATE bairros SET nome = CONVERT(CAST(nome AS BINARY) USING utf8mb4)");
            $conexao->query("UPDATE tiposdelixo SET nome = CONVERT(CAST(nome AS BINARY) USING utf8mb4)");

            die('Migração de charset/collation concluída. Remova o parâmetro migrate_utf8mb4 e recarregue.');
        }
// (mantenha este arquivo SEM saída/echo/HTML)
?>
