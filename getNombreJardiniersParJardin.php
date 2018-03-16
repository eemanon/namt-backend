<?php
	header('Access-Control-Allow-Methods: GET, POST');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Allow-Origin: http://localhost:8081');
	session_start();
	if( isset($_SESSION['identifié'])) {
		$email =  $_SESSION['identifié'];
		require_once('connect.inc.php');
		if(isset($_GET['id'])){ 
			$id = $_GET['id'];
			$req =  pg_query($connection,"	
											SELECT id, nbmaxjardiniers, count(jardin) FROM (
												SELECT \"jardine\".jardin, \"jardin\".id, \"jardin\".nbmaxjardiniers FROM tomato.\"jardin\" 
													LEFT JOIN tomato.\"jardine\"
													ON tomato.\"jardine\".jardin=tomato.\"jardin\".id WHERE \"jardin\".id='$id') touslesjardins group by jardin, nbmaxjardiniers, id
			");
			if($req){
				$row = pg_fetch_object($req);
				$message = array();
				$message["id"] = $row->id;
				$message["nbre"] = $row->count;						
				$message["nbrmax"] = $row->nbmaxjardiniers;				
				echo json_encode($message);
			}else{
				$test["Reponse"] = "Verifier votre connexion en filaire";
				echo json_encode ($test);
			}
			
		} else {
			$req =  pg_query($connection,"	
											SELECT id, nbmaxjardiniers, count(jardin) FROM (
												SELECT \"jardine\".jardin, \"jardin\".id, \"jardin\".nbmaxjardiniers FROM tomato.\"jardin\" 
													LEFT JOIN tomato.\"jardine\"
													ON tomato.\"jardine\".jardin=tomato.\"jardin\".id WHERE \"jardin\".proprio='$email') touslesjardins group by jardin, nbmaxjardiniers, id
			");
			
			if($req){
				$jardiniers = array();
				while ($row = pg_fetch_object($req)){
					$message = array();
					$message["id"] = $row->id;
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
		}
	}else{
		$test["Reponse"] = "Definir la variable email";
		echo json_encode ($test);
	}
				
?>
