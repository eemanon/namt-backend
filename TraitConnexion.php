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
				/*	if($req){
		 echo"<p>";
		 while ($a = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete

					 echo"$a->nom <br/>";
			 }
							echo"</p>";
					}


					while($donnee=$req->fetch()){
						// recuperation et affichage dans le tableau de chaque resultat du SELECT
					//if( $_POST["email"]==$donnee["email"] and $_POST["password"] == $donnee["password"]){ //verification de l'identifiaint et du mot de passe
					if($count == 1){
						//debut de la session
						session_start();
						$_SESSION['identifié'] = 'OK';

						}
						//rediection vers la page d'acceuil
				  // header("location: index.php");
			//formulaire non remplis ou identifants incorrects
		//		}
		//Fermeture du curseur
		$pdostat->closecursor();
	}else{
			//transmission des données par URL sur la page de connexion
				//   header("location: FormConnexion.php?message=<strong>Erreur idenfication... Recommencer </strong>");
			   }
			}
		   }else{
			   if(isset($_COOKIE['idenfication'])){
					session_start();
					$_SESSION['identifié'] = 'OK';
					$cookie =  'cookie';
					//mise en place du cookie valable 1h
					setcookie('idenfication', $cookie,time()+5, null, null, false, true );
				    header("location: index.php");
			   }*/
		  }
?>
