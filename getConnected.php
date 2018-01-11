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

		session_start();
		//verification de l'existance de la session
		if( isset($_SESSION['identifié'])) {
		//Destruction de la session
		echo "OK";
		echo $_SESSION['identifié'];
		//destruction du cookie lier a la session
		//setcookie('idenfication', $cookie,time()-3600, null, null, false, true );
		}
		//redirection page d'idenfication

?>
		</section>
	</div>
</body>
</html>
