<?php
	//inclusion du fichier des identifiants
	require('connection.php');
	$connection = pg_connect("dbname=".BASE." host=".SERVER."  user=".LOGIN." password=".PASS); ;

	if(!$connection){
		//message d'erreur
		echo "Erreur connexion à la base";
	}
?>
