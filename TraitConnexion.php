<?php
	header('Access-Control-Allow-Origin: *');
	if( isset($_GET['email']) and isset($_GET['password']) ){ //Champ identifiant et mot de passe remplis
		require_once('connect.inc.php');
		$mdp = $_GET['password'];
		$email = $_GET['email'];
 		$req =  pg_query($connection,"SELECT * FROM tomato.Utilisateur where email='$email' and pwd='$mdp'");
		$count = pg_num_rows($req);
		if($count == 1){
			echo "OK";
			session_start();
			$_SESSION['identifié'] = $email;
		}else
			echo "Connection refused";
	}
?>
