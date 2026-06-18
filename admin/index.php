<?php

/*
 * SPDX-License-Identifier: GPL-3.0-or-later
 *
 * Copyright (c) 2016, 2018, 2021-2022, 2025 Fernando Mercês
 *
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program. If not, see <https://www.gnu.org/licenses/>.
 */

session_start();
date_default_timezone_set('America/Sao_Paulo');

define("CONFIG_FILE", "../links.ini");
define("ACCESS_CODE", "CHANGEME");

if (!file_exists(CONFIG_FILE)) {
	$fh = fopen(CONFIG_FILE, "w");
	fclose($fh);
}

if ($_SESSION["auth"] == false) {
	if ($_POST["password"]) {
		$pw = $_POST["password"];
		if ($pw == ACCESS_CODE) {
			$_SESSION["auth"] = true;
			header("Location: /admin");
		} else {
			$_SESSION["auth"] = false;
		}
	}

	if ($_SESSION["auth"] == false)
		header("Location: /admin/login.php");
	else
		header("Location: /admin/");
	exit;
}

function validHandle($handle) {
	$handle = trim($handle);
	$handle = strtolower($handle);
	
	$len = strlen($handle);
	if ($len < 1 || $len > 20)
		return false;

	if (!ctype_alnum($handle))
		return false;

	if ($handle == "admin")
		return false;

	return true;
}

function validUrl($url) {
	$url = trim($url);

	$len = strlen($url);
	if ($len < 1 || $len > 300)
		return false;

	if (strpos($url, "https://") !== 0)
		return false;

	return true;
}

function getError($msg) {
	return '<div class="alert alert-danger" role="alert">'. $msg .'</div>';
}

$message = "";

if ($_POST) {
	if ($_POST["handle"] && $_POST["dest"]) {
		$handle = $_POST["handle"];
		$dest = $_POST["dest"];

		$handle = trim($handle);
		$handle = strtolower($handle);

		$dest = trim($dest);

		if (!validHandle($handle))
			$message = getError("Handle inválido. Verifique se usou somente letras minúsculas e números até 20 caracteres.");
		if (!validUrl($dest))
			$message = getError("URL de destino inválida. Ela precisa começar com https:// e ser uma URL válida.");

		if ($message == "") {
			// New links will use INI sections instead
			$now = date('Y-m-d H:i:s');

			$section = "[$handle]" . "\n" .
				"destination = '$dest'" . "\n" .
				"created_at = $now"   . "\n" .
				"updated_at = $now"   . "\n" .
				"created_by = admin"  . "\n";

			$fh = fopen(CONFIG_FILE, "a");
			if ($fh == false)
				die("fopen()");
			if (fwrite($fh, $section) === false) {
				$message = getError("Erro interno. O link não foi salvo.");
			}
			fclose($fh);
		}
	}
}

$path = trim($_SERVER['REQUEST_URI'], "/");
$links = parse_ini_file(CONFIG_FILE, true);

if ($links == false) {
	die("Could not open links.ini");
}

$entries = array();

foreach ($links as $key => $value) {
	if (is_array($value)) {
		array_push($entries, 
		'
			<tr>
				<td><a href="https://menteb.in/'. $key .'">'. $key .'</a></td>
				<td>'. $value["destination"] .'</td>
				<td>'. $value["updated_at"] .'</td>
			<!--
			<td><a class="btn btn-xs btn-info" href="#" role="button">Editar</a></td>
			<td><a class="btn btn-xs btn-danger" href="#" role="button">Excluir</a></td>
			-->
			</tr>
		');
	} else {
	array_push($entries, 
		'
        	<tr>
          		<td><a href="https://menteb.in/'. $key .'">'. $key .'</a></td>
	            <td>'. $value .'</td>
			</tr>
		');
	}
}

$with = implode("\n", array_reverse($entries));
$contents = file_get_contents("tpl/main.tpl");

if (empty($message)) {
	$contents = str_replace("_MESSAGE_", "", $contents);
} else {
	$contents = str_replace("_MESSAGE_", $message, $contents);
}

$contents = str_replace("_LINKS_", $with, $contents);

echo $contents;

?>
