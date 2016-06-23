<?php
	//inclui o arquivo de funções
	require_once 'funcoes.php';
	//contantes com credenciais de acesso ao bd
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_NAME', 'cefetmg');

	//habilita todas as exibições de erros
	ini_set('display_errors', true);
	error_reporting(E_ALL);

	date_default_timezone_set('America/Sao_Paulo');
?>
