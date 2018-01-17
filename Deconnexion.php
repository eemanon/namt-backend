<?php
			header('Access-Control-Allow-Methods: GET, POST');
			header("Access-Control-Allow-Headers: X-Requested-With");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Allow-Origin: http://localhost:8081');
					session_start();
					//verification de l'existance de la session
					if( isset($_SESSION['identifié'])) {
					//Destruction de la session
			     session_destroy();
					unset($_SESSION['identifié']);
					//destruction du cookie lier a la session
					$test["Reponse"] = "Déconnexion Effectuer";
					echo json_encode ($test);
				}else{

						$test["Reponse"] = "Connexion inexistante";
						echo json_encode ($test);

				}
?>
