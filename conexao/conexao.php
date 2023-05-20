
	<meta charset="utf-8">
<?php 
	$servidor 	= "localhost";
	$user 		= "root";
	$senha 		= "";
	$bd 		= "whatsfood";
	$charset 	= "utf8";

	$Con = mysqli_connect($servidor,$user,$senha,$bd)
	or die(mysqli_connect_error());
	if (!$Con) {
		echo " Não conectou";
	
	}


 ?>