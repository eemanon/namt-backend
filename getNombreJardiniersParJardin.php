<?php
	header('Access-Control-Allow-Methods: GET, POST');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Allow-Origin: http://localhost:8081');
	session_start();
	if( isset($_SESSION['identifié'])) {
		require_once('connect.inc.php');
		$req =  pg_query($connection,"SELECT jardin, count, jardin.nbmaxjardiniers FROM (SELECT count(jardine.jardin), jardine.jardin from tomato.\"jardine\" group by jardin) sousrequete, tomato.\"jardin\" where jardin.id = sousrequete.jardin");
		//Executon de la requete preparer

		if($req){
			$jardiniers["message"] = array();
			while ($row = pg_fetch_object($req)){
				$message = array();
				$message["id"] = $row->jardin;
				$message["nbre"] = $row->count;						
				$message["nbrmax"] = $row->nbmaxjardiniers;
									// push single vehicule into final response array
				array_push($jardiniers, $message);
			}
			echo json_encode($jardiniers);
		}else{
			$test["Reponse"] = "Verifier votre connexion en filaire";
			echo json_encode ($test);
		}
	}else{
		$test["Reponse"] = "Definir la variable email";
		echo json_encode ($test);
	}
				
?>
