<?php
			header('Access-Control-Allow-Methods: GET, POST');
			header("Access-Control-Allow-Headers: X-Requested-With");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Allow-Origin: http://localhost:8081');
			session_start();
			if(isset($_SESSION['identifié'])){ //Champ identifiant et mot de passe remplis
				require_once('connect.inc.php');
				$email = $_SESSION['identifié'];
				$req =  pg_query($connection,"SELECT * FROM tomato.Evenement where organisateur='$email'");
				//Executon de la requete preparer
				if($req){
					$events["event"] = array();
					while ($evt = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
						$event = array();
						$event["organisateur"] = $evt->organisateur;
						$event["nom"] = $evt->nom;
						$event["date"] = $evt->dateevent;
						$event["adresse"] = $evt->adresse;
						// push single vehicule into final response array
						array_push($events["event"], $event);
					}
					echo json_encode($events);
				}
			}else{
				$test["Reponse"] = "Veillez vous connecte";
				echo json_encode ($test);
			}
?>
