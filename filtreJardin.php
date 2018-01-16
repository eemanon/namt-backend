<?php 	
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
			require('connection.php'); 
            $connection = pg_connect("dbname=".BASE." host=".SERVER." user=".LOGIN." password=".PASS); 
			if(!$connection){echo"pas de connection, passe en filaire mon grand";}
			
			if(isset($_GET['s'])){
			$s=$_GET['s'];
			echo $s;
			$req = pg_query($connection,"SELECT tomato.Jardin.id,tomato.Jardin.adresse,tomato.Jardin.info,tomato.Jardin.description,tomato.Jardin.photo,tomato.Jardin.nom,tomato.Jardin.ville,tomato.Jardin.code,tomato.utilisateur.pseudo,tomato.utilisateur.photo,ST_AsGeoJSON(geom) as geoJ FROM tomato.Jardin,tomato.utilisateur where (code='$s' or ville='$s' or proprio='$s' or adresse='$s') and tomato.Jardin.proprio=tomato.utilisateur.email"); 
			}
			
			else{
			$pol="SELECT *,ST_AsGeoJSON(geom) as geoJ FROM  tomato.Jardin";
			$req = pg_query($connection,$pol);
			}
			
            if($req){
				$s='[';
				while($a=pg_fetch_assoc($req)){
					$s.=json_encode($a).',';//chope la reponse en dico et la met en string formater JSON
				}
				
				$s=substr_replace($s,'',-1);
                echo $s.']';
            }
			else{
				echo "<b>Erreur dans l'exécution de la requête. </b><br/>";
				echo "<b>Message de mySQL: </b>".mysqli_error($connexion);
				}			
			pg_close($connection);
        ?>
		
