<?php
			header('Access-Control-Allow-Origin: *');
		   //if(isset($_POST['connexion']) ){ //Formulaie soumis
			   if(isset($_GET['email'])){ //Champ identifiant et mot de passe remplis
					 require_once('connect.inc.php');
					 $email = $_GET['email'];
	 					$req =  pg_query($connection,"SELECT pseudo FROM tomato.Utilisateur where email='$email'");
						$req2 =  pg_query($connection,"SELECT * FROM tomato.Jardin where propio='$email'");
						$req3 =  pg_query($connection,"SELECT nom  FROM tomato.Jardine Je, tomato.Jardin J where J.id=Je.jardin &&  Je.jardinier='$email'");
						$req4 =  pg_query($connection,"SELECT * FROM tomato.Evaluation where evalue='$email'");
 						//Executon de la requete preparer

				if($req){
					while ($pseudo = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
						 echo json_encode($pseudo);
					}
				}

				if($req3){
					$jardines = array();
					while ($nom = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
						$jardines.push($nom);
						 echo json_encode($jardines);
					}
				}


			if($req2){
						$jardins["jardin"] = array();
				while ($jardin = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
					$jardin = array();
			        $jardin["nom"] = $jardin->nom;
			        $jardin["photo"] = $jardin->photo;
			        $jardin["description"] = $jardin->description;
					// push single vehicule into final response array
			        array_push($jardins["jardin"], $jardin);
					 echo json_encode($jardins);
				}
			}


			if($req4){
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
