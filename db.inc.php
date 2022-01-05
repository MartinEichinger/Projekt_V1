<?php
try {
	$pdo = new PDO('mysql:dbname=sozialesnetzwerk;host=localhost', 'root', '');
	//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo 'Fehler bei der Verbindung: ' .
		$e->getMessage();
	exit();
}
