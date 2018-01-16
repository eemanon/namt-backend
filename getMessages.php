<?php
			header('Access-Control-Allow-Origin: *');
		   //if(isset($_POST['connexion']) ){ //Formulaie soumis

			 session_start();
			 //verification de l'existance de la session
			 if( isset($_SESSION['identifié'])) {
						require_once('connect.inc.php');
			 $email =  $_SESSION['identifié'];
			 $req =  pg_query($connection,"SELECT id FROM tomato.Jardin where proprio='$email'");
				 //Executon de la requete preparer

		if($req){
			 while ($a = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
							if(isset($_GET['lu']) ){ //Champ identifiant et mot de passe remplis
									 $lu = $_GET['lu'];
									 $jardin = $a->id;

										 $req2 =  pg_query($connection,"SELECT * FROM tomato.\"demandeJardin\" where jardin='$jardin' and lu='$lu'");
											 //Executon de la requete preparer
									if($req2){
										$messages["message"] = array();
										while ($msg = pg_fetch_object($req2)){//boucle sur tous les resultat obtenuent de la requete
											$message = array();
													$message["commentaire"] = $msg->commentaire;
													$message["demandeur"] = $msg->demandeur;
											// push single vehicule into final response array
													array_push($messages["message"], $message);
										}
										echo json_encode($messages);
									}


					 }
			}
		 }else{
					 echo "Erreur : Utilisateur non connecté";
		 }
		}
?>
