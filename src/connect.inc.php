<?php
	//inclusion du fichier des identifiants
	require('connection.php');
	$connection = pg_connect("dbname=".BASE." host=".SERVER."  user=".LOGIN." password=".PASS); ;

	if(!$connection){

			$test["Reponse"] = "Connexion impossible à la base : Verifier votre connexion en filaire";
			echo json_encode ($test);

	}
?>
