<?php
	try {
		$conn = new PDO("mysql:host=localhost;dbname=alquiler","admAlquiler","AdmAlquiler");
	} catch (PDOException $ex) {
		print_r("Error: ". $ex->getMessage());
		//die($ex->getMessage());
		die();
	}
?>