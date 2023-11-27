<?php
 	$username="root";
 	$password="";
 	$database="Agenda";
 	$IdHoby=$_POST['IdHoby'];
 	$Hoby=$_POST['Hoby'];


 	
 	$cnn=new mysqli("localhost", $username, $password, $database);
 	$SQL="
		UPDATE Hoby
		SET 
			Hoby='$Hoby' 
			WHERE IdHoby=$IdHoby
 		";
 	$Tabla=$cnn->query("$SQL");
 	$cnn->Close();
 	header("Location: ../Personas/index.php");
?>