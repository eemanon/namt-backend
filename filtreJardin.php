<?php header('Access-Control-Allow-Origin: *');
			require('connection.php'); 
            $connection = pg_connect("dbname=".BASE." host=".SERVER." user=".LOGIN." password=".PASS); 
			if(!$connection){echo"nop";}
			
			$req = pg_query($connection,'SELECT *,ST_AsGeoJSON(geom) as geoJ  FROM tomato.Jardin'); 
			
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