<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./include/styles.css" />
	<title>Mon site !</title>
</head>
<body>
		<section id="content">

<?php

		session_start();
		//verification de l'existance de la session
		if( isset($_SESSION['identifié'])) {
				 require_once('connect.inc.php');
		//Destruction de la session
		echo "OK";
		$email =  $_SESSION['identifié'];
		$req =  pg_query($connection,"SELECT * FROM tomato.Utilisateur where email='$email'");
			//Executon de la requete preparer
		if($req){
	echo"<p>";
	while ($a = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete


		 echo"$a->nom <br/>";
		  echo"$a->prenom <br/>";

	}
				echo"</p>";
		}
		}
		//redirection page d'idenfication

?>
		</section>
	</div>
</body>
</html>
