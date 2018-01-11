<?php
			header('Access-Control-Allow-Origin: *');
		   //if(isset($_POST['connexion']) ){ //Formulaie soumis
			   if( isset($_GET['email']) and isset($_GET['password']) ){ //Champ identifiant et mot de passe remplis
					 require_once('connect.inc.php');
					 $mdp = $_GET['password'];
					 $email = $_GET['email'];
 					$req =  pg_query($connection,"SELECT * FROM tomato.Utilisateur where email='$email' and pwd='$mdp'");
 						//Executon de la requete preparer

					$count = pg_num_rows($req);
					//echo $count;
					if($count == 1){
						//debut de la session
						echo "OK";
						session_start();
						$_SESSION['identifié'] = $email;
					else
						echo "Connection refused";
				}
		  }
?>
