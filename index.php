<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            require('connection.php'); 
            $connection = pg_connect("dbname=".BASE." host=".SERVER." user=".LOGIN." password=".PASS); 
			if(!$connection){echo"<h2>chiasse</h2>";}
			echo "tamere";
			$req = pg_query($connection,'SELECT * FROM tomato.Utilisateur'); 
            if($req){
				echo"<p>";
				while ($a = pg_fetch_object($req)){//boucle sur tous les resultat obtenuent de la requete
				
							echo"$a->nom <br/>";
					}
                echo"</p>";
            }
			pgclose($connection);			


        ?>

    </body></html>
