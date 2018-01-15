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
		 echo"<p>";
		 while ($a = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete

					 if(isset($_GET['lu']) ){ //Champ identifiant et mot de passe remplis
						 $lu = $_GET['lu'];
						 $nbrow = 0;
						 if($lu == TRUE){
							 $req2 =  pg_query($connection,"SELECT commentaire FROM tomato.demandeJardin ");
								 //Executon de la requete preparer
						 }

					if($req2){
						while ($comment = pg_fetch_object($req2)){//boucle sur tous les resultat obtenuent de la requete
							$nbrow = $nbrow+1;
							 echo json_encode($comment);
							 echo json_encode($comment);
						}
					}


		 }

			 }
		 }else{
					 echo "Erreur : Utilisateur non connecté";
		 }
		}
?>
