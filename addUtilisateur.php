<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./include/styles.css" />
	<title>Mon site !</title>
</head>
<body>
		<section id="content">
			<?php
							 header('Access-Control-Allow-Origin');
					   //if(isset($_POST['connexion']) ){ //Formulaie soumis
						   if( isset($_GET['email']) and isset($_GET['password'] and isset($_GET['nom'] and isset($_GET['prenom']) and isset($_GET['pseudo']){ //Champ identifiant et mot de passe remplis
								 require_once('connect.inc.php');
								 $mdp = $_GET['password'];
								 $email = $_GET['email'];
								 $prenom = $_GET['prenom'];
								$nom = $_GET['nom'];

								if( isset($_GET['photo']){
										$photo = $_GET['photo'];
								}else{
										$photo = "";
								}

								if( isset($_GET['description']){
										$description = $_GET['description'];
								}else{
										$description = "";
								}
								$pseudo =  $_GET['pseudo'];
			 					$req =  pg_query($connection,"INSERT  INTO tomato.Utilisateur (email, nom,prenom, pwd,photo) values ($email, $nom,$prenom, $pwd, $photo,$pseudo,$description)");
			 						//Executon de la requete preparer
								if($req){
									//debut de la session
									echo "Insertion effectuer";
									}
					  }
			?>
		</section>
	</div>
</body> 
</html>
