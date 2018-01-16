<?php

		session_start();
		//verification de l'existance de la session
		if( isset($_SESSION['identifié'])) {
		//Destruction de la session
     	session_destroy();
		unset($_SESSION['identifié']);
		//destruction du cookie lier a la session
		}
?>
