<?php
			header('Access-Control-Allow-Methods: GET, POST');
			header("Access-Control-Allow-Headers: X-Requested-With");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Allow-Origin: http://localhost:8081');
			if(isset($_GET['id'])){ 
					require_once('connect.inc.php');	
					$id = $_GET['id'];
					$req =  pg_query($connection,"SELECT * FROM tomato.commentaire, tomato.utilisateur where jardin='$id' and utilisateur.email=commentaire.commentateur");
					//Executon de la requete preparer
					if($req){
							$nb = 0;
							$moyenne = 0;
							$evaluations["evaluation"] = array();
							
							while ($eval = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete

								$evaluation = array();
								$evaluation["note"] = $eval->note;
								$evaluation["commentaire"] = $eval->libelle;
								$evaluation["auteur"] = $eval->commentateur;
								$evaluation["icon"] = $eval->photo;
								$nb = $nb+1;
								$moyenne = $moyenne + $eval->note ;
								array_push($evaluations["evaluation"], $evaluation);

							}
							if($moyenne!=0)
								$moyenne = $moyenne/$nb;
							$evaluations["moyenne"] = $moyenne;
							echo json_encode($evaluations);
					}else{
						$test["Reponse"] = "Verifier votre connexion en filaire";
						echo json_encode ($test);
					}
			}else{
				$test["Reponse"] = "Definir la variable id";
				echo json_encode ($test);
			}

?>
