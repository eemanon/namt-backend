<?php
			header('Access-Control-Allow-Origin: *');
		   //if(isset($_POST['connexion']) ){ //Formulaie soumis
			   if(isset($_GET['email'])){ //Champ identifiant et mot de passe remplis
					 require_once('connect.inc.php');
					 $email = $_GET['email'];
						$req =  pg_query($connection,"SELECT * FROM tomato.Evaluation where evalue='$email'");
 						//Executon de la requete preparer
			if($req){
				$evaluations["jardin"] = array();
				while ($evaluation = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
					$evaluation = array();
							$evaluation["nom"] = $evaluation->nom;
							$evaluation["photo"] = $evaluation->photo;
							$evaluation["description"] = $evaluation->description;
					// push single vehicule into final response array
							array_push($evaluations["$evaluation"], $evaluation);
					 echo json_encode($evaluations);
				}
			}
		}
?>
