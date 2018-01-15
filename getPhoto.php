<?php
			header('Access-Control-Allow-Origin: *');
		   //if(isset($_POST['connexion']) ){ //Formulaie soumis
			   if(isset($_GET['email'])){ //Champ identifiant et mot de passe remplis
					 require_once('connect.inc.php');
					 $email = $_GET['email'];
	 					$req =  pg_query($connection,"SELECT photo FROM tomato.Utilisateur where email='$email'");
 						//Executon de la requete preparer

				if($req){
					while ($pseudo = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
						 echo json_encode($pseudo);
					}
				}
		}
?>
