<?php
			header('Access-Control-Allow-Methods: GET, POST');
			header("Access-Control-Allow-Headers: X-Requested-With");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Allow-Origin: http://localhost:8081');

class Jardines{ 
	function getJardines(){
			if(isset($_GET['email'])){ //Champ identifiant et mot de passe remplis
				require_once('connect.inc.php');
				$email = $_GET['email'];
				$req =  pg_query($connection,"SELECT J.nom, J.info, J.photo,U.pseudo  FROM tomato.Jardine Je, tomato.Jardin J, tomato.Utilisateur U  where J.id=Je.jardin and Je.jardinier='$email' and U.email=J.proprio");
				//Executon de la requete preparer
				if($req){
					$jardines = array();
					while ($nom = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
						array_push($jardines,$nom);

					}
						echo json_encode($jardines);
				}else{
					$test["Reponse"] = "Verifier votre connexion en filaire";
					echo json_encode ($test);
				}
			}else{
				$test["Reponse"] = "Definir la variable email";
				echo json_encode ($test);
			}
	} 
}
	
$jardine = new Jardines;
$jardine->getJardines();	

?>
