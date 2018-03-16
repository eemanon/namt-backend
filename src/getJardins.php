<?php
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: http://localhost:8081');

class Jardins{


	function getJardins(){

		if(isset($_GET['email'])){ //Champ identifiant et mot de passe remplis
			require_once('connect.inc.php');
			$email = $_GET['email'];
			$req =  pg_query($connection,"SELECT * FROM tomato.Jardin where proprio='$email'");
			//Executon de la requete preparer

			if($req){
				$jardins = array();
				while ($jard = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
					$jardin = array();
					$jardin["nom"] = $jard->nom;
					$jardin["proprio"] = $jard->proprio;
					$jardin["info"] = $jard->info;
					$jardin["photo"] = $jard->photo;

					// push single vehicule into final response array
					array_push($jardins, $jardin);


				}
				echo json_encode($jardins);



			}else{
				$test["Reponse"] = "Verifier votre connexion en filaire";
				echo json_encode ($test);
			}
		}else{
			$test["Reponse"] = "Definir la variable email";
			echo json_encode ($test);
		}

	}

}

$jardins = new Jardins;
$jardins->getJardins();
?>
