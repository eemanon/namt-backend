<?php
			header('Access-Control-Allow-Methods: GET, POST');
			header("Access-Control-Allow-Headers: X-Requested-With");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Allow-Origin: http://localhost:8081');
			if(isset($_GET['email'])){ //Champ identifiant et mot de passe remplis
				require_once('connect.inc.php');
				$email = $_GET['email'];
				$req =  pg_query($connection,"SELECT J.nom  FROM tomato.Jardine Je, tomato.Jardin J where J.id=Je.jardin and J.proprio='$email'");
				//Executon de la requete preparer
				if($req){
					$jardines = array();
					while ($nom = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
						$jardines.push($nom);
						echo json_encode($jardines);
					}
				}
			}
?>
