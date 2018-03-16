<?php 	
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Credentials: true');
			require('connection.php'); 
            $connection = pg_connect("dbname=".BASE." host=".SERVER." user=".LOGIN." password=".PASS); 
			if(!$connection){echo"pas de connection, passe en filaire mon grand";}
			
			if(isset($_POST)){
				print_r( array_keys($_POST));
				$request_body = file_get_contents('php://input');
				$data = json_decode($request_body);
				echo gettype($data);
				$proprio=$data->proprio;
				$adresse=$data->adresse;
				$info=$data->info;
				$desc=$data->desc;
				$nom=$data->nom;
				$ville=$data->ville;
				$cp=$data->cp;
				$nbmax=$data->nbmax;
				$icon=$data->icon;
				$lati=$data->lati;
				$longi=$data->longi;
				$yop="INSERT  INTO tomato.Jardin (proprio, adresse,info, description,photo,geom, nom,ville,code,icon,nbmaxjardiniers) 
							VALUES ('$proprio', '$adresse','$info', '$desc', 'images/jardin.jpg',ST_GeomFromText('POINT($lati $longi)',2154),'$nom','$ville','$cp','$icon',$nbmax)";
				echo $yop;
				$req = pg_query($connection,$yop); 
				echo'yop';
				}
			else{
				echo'nope';
				}
			
      	
			pg_close($connection);
        ?>
		
