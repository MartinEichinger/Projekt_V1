<?php
try {
	$pdo = new PDO('mysql:dbname=sozialesnetzwerk;host=localhost', 'root', '');
} catch (PDOException $e) {
	echo 'Fehler bei der Verbindung: ' .
		$e->getMessage();
	exit();
}
