<?php
			header('Access-Control-Allow-Methods: GET, POST');
			header("Access-Control-Allow-Headers: X-Requested-With");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Allow-Origin: http://localhost:8081');
			if( isset($_GET['email']) and isset($_GET['password']) ){ //Champ identifiant et mot de passe remplis
				require_once('connect.inc.php');
				$mdp = $_GET['password'];
				$email = $_GET['email'];
				$req =  pg_query($connection,"SELECT * FROM tomato.Utilisateur where email='$email' and pwd='$mdp'");
				if($req){
					$count = pg_num_rows($req);
					if($count == 1){
						echo "OK";
						session_start();
						$_SESSION['identifié'] = $email;
					}else{
						$test["Reponse"] = "Identifiant incorrect";
						echo json_encode ($test);
					}
				}else{
					$test["Reponse"] = "Verifier votre connexion en filaire";
					echo json_encode ($test);
				}
			}else{
				$test["Reponse"] = "Definir la variable email et mot de passe";
				echo json_encode ($test);
			}
				
?>
