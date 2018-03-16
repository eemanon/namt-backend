<?php
	header('Access-Control-Allow-Methods: GET, POST');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Allow-Origin: http://localhost:8081');

	session_start();
	//verification de l'existance de la session
	if(isset($_SESSION['identifié'])) {
					require_once('connect.inc.php');
					$email =  $_SESSION['identifié'];
					if(isset($_POST['jardin']) && isset($_POST['message']) && isset($_POST['sujet'])){
						$jardin = $_POST['jardin'];
						$message = pg_escape_string($_POST['message']);
						$sujet = pg_escape_string($_POST['sujet']);
						//check if this person already sent a message...
						$req =  pg_query($connection,"SELECT id FROM tomato.\"demandeJardin\" where jardin=$jardin and demandeur='$email'");
						if($req){
							if(pg_num_rows($req)==0){
								$req2 =  pg_query($connection,"INSERT INTO tomato.\"demandeJardin\" (demandeur, commentaire, requete, jardin, lu, sujet, date, status)
												VALUES ('$email', '$message', TRUE, $jardin, FALSE, '$sujet', CURRENT_DATE, 'p')");
								if($req2){
										$test["Reponse"] = "Message sent";
										echo json_encode ($test);
										
								}else {
										$test["Reponse"] = "Echec d envoi";
										echo json_encode ($test);										
										}	
							} else {
								$test["Reponse"] = "Vous avez déjà envoyé un message concernant ce jardin. Message pas envoyé";
								echo json_encode ($test);							
							}
							
						} else {
							$test["Reponse"] = "Verifier votre connexion en filaire";
							echo json_encode ($test);
						}
					} else {
						$test["Reponse"] = "Jardin ou Message ou Sujet not set";
						echo json_encode ($test);
				}				
	}else{
		$test["Reponse"] = "Veillez vous connecte";
		echo json_encode ($test);
	}			
?>

