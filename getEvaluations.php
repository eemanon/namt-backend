<?php
			header('Access-Control-Allow-Origin: *');
		   //if(isset($_POST['connexion']) ){ //Formulaie soumis
			   if(isset($_GET['email'])){ //Champ identifiant et mot de passe remplis
					 require_once('connect.inc.php');
					 $email = $_GET['email'];
						$req =  pg_query($connection,"SELECT * FROM tomato.Evaluation where evalue='$email'");
 						//Executon de la requete preparer
			if($req){
						$nb = 0;
						$moyenne = 0;
				$evaluations["evaluation"] = array();
				while ($eval = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete

					$evaluation = array();
							$evaluation["note"] = $eval->note;
							$evaluation["commentaire"] = $eval->commentaire;
							$evaluation["evaluateur"] = $eval->evaluateur;
							$nb = $nb+1;
							$moyenne = $moyenne + $eval->note ;

					// push single vehicule into final response array
							array_push($evaluations["evaluation"], $evaluation);

				}
				$moyenne = $moyenne/$nb;
					array_push($evaluations["evaluation"], $moyenne);
				echo json_encode($evaluations);
			}
		}
?>
