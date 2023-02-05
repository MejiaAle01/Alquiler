<?php
	try {
		$conn = new PDO("mysql:host=xxxxx;dbname=xxxxx","xxxxxx","xxxxxxx");
	} catch (PDOException $ex) {
		print_r("Error: ". $ex->getMessage());
		//die($ex->getMessage());
		die();
	}
?>
