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
		header('Access-Control-Allow-Origin: *');
		session_start();
		//verification de l'existance de la session
		if( isset($_SESSION['identifié'])) {
				 require_once('connect.inc.php');
		$email =  $_SESSION['identifié'];
		$req =  pg_query($connection,"SELECT * FROM tomato.Utilisateur where email='$email'");
			//Executon de la requete preparer
			$infos["info"] = array();

		if($req){
	echo"<p>";
	while ($a = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
		$info = array();
     $info["nom"] = $a->nom;
		 $info["prenom"] = $a->prenom;
		  $info["pseudo"] = $a->pseudo;
			 $info["email"] = $a->email;

		 array_push($infos["info"],$info);
		 echo json_encode($infos);

	}

		}
	}else{
				echo "Erreur : Utilisateur non connecté";
	}
		//redirection page d'idenfication

?>
		</section>
	</div>
</body>
</html>
