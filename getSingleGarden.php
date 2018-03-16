<?php
			header('Access-Control-Allow-Methods: GET, POST');
			header('Access-Control-Allow-Headers: X-Requested-With');
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Allow-Origin: http://localhost:8081');
			if(isset($_GET['id'])){ 
				require_once('connect.inc.php');
				$id = $_GET['id'];
				$req =  pg_query($connection,"SELECT Jardin.surface, utilisateur.nom as userName, utilisateur.photo as userPhoto, utilisateur.prenom as userFirstname, adresse as gardenAddress, jardin.info as gardenInfo, Jardin.description as gardenDescription, Jardin.photo as gardenPhoto, Jardin.nom as gardenName, ville as city, code, jardin.icon as gardenIcon, nbmaxjardiniers as gardenMaxGardeners FROM tomato.\"jardin\", tomato.\"utilisateur\" WHERE jardin.proprio = utilisateur.email AND jardin.id ='$id'");
				//Executon de la requete preparer

				if($req){
					$jardins = array();
					while ($jard = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
						$jardin = array();
						$jardin["username"] = $jard->username;
						$jardin["userphoto"] = $jard->userphoto;
						$jardin["userfirstname"] = $jard->userfirstname;
						$jardin["gardenaddress"] = $jard->gardenaddress;
						$jardin["gardeninfo"] = $jard->gardeninfo;
						$jardin["gardendescription"] = $jard->gardendescription;
						$jardin["gardenphoto"] = $jard->gardenphoto;
						$jardin["gardenicon"] = $jard->gardenicon;
						$jardin["gardenname"] = $jard->gardenname;
						$jardin["city"] = $jard->city;
						$jardin["code"] = $jard->code;
						$jardin["gardenmaxgardeners"] = $jard->gardenmaxgardeners;
						$jardin["surface"] = $jard->surface;
						// push single vehicule into final response array
						array_push($jardins, $jardin);


					}
						echo json_encode($jardins);



				}else{
					$test["Reponse"] = "Verifier votre connexion en filaire";
					echo json_encode ($test);
				}
			}else{
				$test["Reponse"] = "Definir la variable GET id";
				echo json_encode ($test);
			}
?>
