<?php
	header('Access-Control-Allow-Methods: GET, POST');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Allow-Origin: http://localhost:8081');
	session_start();
	
	if( isset($_SESSION['identifié']) && isset($_GET['garden']) && isset($_GET['gardener'])) {	
		$email =  $_SESSION['identifié'];
		$garden = $_GET['garden'];
		$gardener = $_GET['gardener'];
		require_once('connect.inc.php');
		//1 check if garden is in possession of user
		$req1 =  pg_query($connection, "SELECT id FROM tomato.\"jardin\" where proprio = '$email' and id = $garden");	
		if(pg_num_rows($req1)==1){
			//2 add user to garden
			$req2 = pg_query($connection, "INSERT INTO tomato.\"jardine\" (jardin, jardinier, datedebut, datefin)
												VALUES ('$garden', '$gardener', '1111-11-11', '1111-11-11')");	
			if($req2){
				//3 if success, then try adding a message for the added user. Therefore, get the exact date of the request first...
				$req3 = pg_query($connection, "SELECT date FROM tomato.\"demandeJardin\" where demandeur='$gardener' and jardin = $garden");
				if($req3){
					$a = pg_fetch_object($req3);
					$date = $a->date;
					$req4 = pg_query($connection, "INSERT INTO tomato.\"demandeJardin\" (demandeur, commentaire, requete, jardin, lu, sujet, date)
												VALUES ('$gardener', 'Rendez-vous vite sur le tchat du jardin pour vous presenter!', FALSE, $garden, FALSE, 'Votre demande a été accepté!', '$date')");
					if($req4){
						$req5 = pg_query($connection, "UPDATE tomato.\"demandeJardin\" SET status='a' WHERE demandeur='$gardener' and jardin = $garden");
						if($req5){
							$test["Reponse"] = "Jardinier ajouté au jardin. Jardinier informé";
							echo json_encode ($test);	
						} else {
							$test["Reponse"] = "Couldn't update request. Gardener added, message sent";
							echo json_encode ($test);	
						}
					}						
				} else {
					$test["Reponse"] = "Couldnt find request for garden. Gardener added but no message could be sent.";
					echo json_encode ($test);				
				}
				
			} else {
				$test["Reponse"] = "Couldn't add gardener to garden";
				echo json_encode ($test);						
			}	
		} else {
			$test["Reponse"] = "Le jardin n'appartient pas a l'utilisateur connecté";
			echo json_encode ($test);			
		}		
	}else{
		$test["Reponse"] = "Definir la variable email et ou garden et ou gardener";
		echo json_encode ($test);
	}
				
?>
