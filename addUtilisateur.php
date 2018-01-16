<?php
			header('Access-Control-Allow-Methods: GET, POST');
			header("Access-Control-Allow-Headers: X-Requested-With");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Allow-Origin: http://localhost:8081');
			if( isset($_GET['email']) and isset($_GET['password']) and isset($_GET['nom']) and isset($_GET['prenom']) and isset($_GET['pseudo'])) { //Champ identifiant et mot de passe remplis
				require_once('connect.inc.php');
				$mdp = $_GET['password'];
				$email = $_GET['email'];
				$prenom = $_GET['prenom'];
				$nom = $_GET['nom'];

				if( isset($_GET['photo'])){
					$photo = $_GET['photo'];
				}else{
					$photo = "";
				}

				if( isset($_GET['description']) ){
					$description = $_GET['description'];
				}else{
					$description = "";
				}
				$pseudo =  $_GET['pseudo'];
				$req =  pg_query($connection,"INSERT  INTO tomato.Utilisateur (email, nom,prenom, pwd,photo,pseudo, description) VALUES ('$email', '$nom','$prenom', '$mdp', '$photo','$pseudo','$description')");
				//Executon de la requete preparer
				if($req){
					//debut de la session
					$test["Reponse"] = "Insertion Effectuer";
					echo json_encode ($test);
				}else{
					$test["Reponse"] = "Verifier votre connexion en filaire";
					echo json_encode ($test);
				}
			}else{
				$test["Reponse"] = "Definir les variables email, password, nom, prenom, pseudo";
				echo json_encode ($test);
			}
				pg_close($connection);
?>
