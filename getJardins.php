<?php
			header('Access-Control-Allow-Origin: *');
		   //if(isset($_POST['connexion']) ){ //Formulaie soumis
			   if(isset($_GET['email'])){ //Champ identifiant et mot de passe remplis
					 require_once('connect.inc.php');
					 $email = $_GET['email'];
						$req =  pg_query($connection,"SELECT * FROM tomato.Jardin where propio='$email'");
 						//Executon de la requete preparer

			if($req){
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
		}
?>
