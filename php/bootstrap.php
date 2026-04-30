<?php
declare(strict_types=1);

// Sessão (só inicia se ainda não estiver ativa)
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

// UTF-8 no HTTP (evita caracteres quebrados após login/sessão)
if (!headers_sent()) {
	header('Content-Type: text/html; charset=utf-8');
}
ini_set('default_charset', 'UTF-8');
if (function_exists('mb_internal_encoding')) {
	mb_internal_encoding('UTF-8');
}

// MySQLi + credenciais ($DB_HOST/$DB_NAME/...) ficam disponíveis via conexao.php
require __DIR__ . "/conexao.php";

// Helper de PDO único (utf8mb4 + sem emulação)
function diomaps_pdo(): PDO {
	static $pdo = null;

	if ($pdo instanceof PDO) return $pdo;

	// vem do conexao.php
	global $DB_HOST, $DB_PORT, $DB_NAME, $DB_USER, $DB_PASS;

	$pdo = new PDO(
		"mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};charset=utf8mb4",
		$DB_USER,
		$DB_PASS,
		[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		]
	);

	$pdo->exec("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
	return $pdo;
}
