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
		//session_destroy();
		//unset($_SESSION['identifié']);
		return $_SESSION['identifié'];
	}else {
		# code...

			return 1 ;
	}
		//redirection page d'idenfication

?>
		</section>
	</div>
</body>
</html>
