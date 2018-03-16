<?php
			header('Access-Control-Allow-Methods: GET, POST');
			header("Access-Control-Allow-Headers: X-Requested-With");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Allow-Origin: http://localhost:8081');
class Pseudo{ 

	function getPseudo(){
			if(isset($_GET['email'])){ //Champ identifiant et mot de passe remplis
				require_once('connect.inc.php');
				$email = $_GET['email'];
				$req =  pg_query($connection,"SELECT pseudo FROM tomato.Utilisateur where email='$email'");
				//Executon de la requete preparer
				if($req){
					while ($pseudo = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
						echo json_encode($pseudo);
					}
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

$pseudo = new Pseudo;
$pseudo->getPseudo();

?>
