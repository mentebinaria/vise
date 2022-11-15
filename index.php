<?php

$path = trim($_SERVER['REQUEST_URI'], "/");
$links = parse_ini_file('links.ini');

if ($links == false) {
	die("Could not open links.ini");
}

if ($path == "admin") { // admin view
	echo '<pre>';
	print_r($links);
	echo '</pre>';
	die();
}

if (array_key_exists($path, $links))
	header('Location: ' . $links[$path]);
else
	header('Location: ' . 'https://www.mentebinaria.com.br'); // default redirect
?>
