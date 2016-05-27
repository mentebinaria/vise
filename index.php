<?php

$path = trim($_SERVER['REQUEST_URI'], "/");
$links = parse_ini_file('links.ini');

if (array_key_exists($path, $links))
	header('Location: ' . $links[$path]);
else
	header('Location: ' . 'http://mentebinaria.com.br');

?>
