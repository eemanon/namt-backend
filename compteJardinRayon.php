<?php 	
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
			require('connection.php'); 
            $connection = pg_connect("dbname=".BASE." host=".SERVER." user=".LOGIN." password=".PASS); 
			if(!$connection){echo"pas de connexion, passe en filaire mon grand";}
			if(isset($_GET['limite'])){
				$limite=$_GET['limite'];
				
				//$x=(isset($_GET['longi']) and is_numeric($_GET['longi']))? $_GET['longi']:43.59977052974089);
				//$y=((isset($_GET['lati']) and is_numeric($_GET['lati']))? $_GET['lati']:1.4409854995883367);
				$x=$_GET['longi'];
				$y=$_GET['lati'];
				$qst="Select count(*) from tomato.jardin where ST_Distance(ST_GeomFromText('POINT($y $x)',2154),geom)*100000<$limite";
		
				$req = pg_query($connection,$qst); 
				}
			else{
				echo"Nope";
			}
			
            if($req){
				while($a=pg_fetch_assoc($req)){
					echo $a['count'];
				}
				
    
            }
			else{
				echo "<b>Erreur dans l'exécution de la requête. </b><br/>";
				echo "<b>Message de mySQL: </b>".pg_error($connexion);
				}			
			pg_close($connection);
			
        ?>
		
