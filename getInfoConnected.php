<?php

		header('Access-Control-Allow-Methods: GET, POST');
		header("Access-Control-Allow-Headers: X-Requested-With");
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Origin: http://localhost:8081');
		session_start();
		//verification de l'existance de la session
		if( isset($_SESSION['identifié'])) {
			require_once('connect.inc.php');
			$email =  $_SESSION['identifié'];
			$req =  pg_query($connection,"SELECT * FROM tomato.Utilisateur where email='$email'");
			//Executon de la requete preparer
			$infos["info"] = array();

			if($req){
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
			$test["Reponse"] = "Veillez vous connecte";
			echo json_encode ($test);
		}
		//redirection page d'idenfication

?>
