<?php
 	$username="root";
 	$password="";
 	$database="Agenda";
 	$IdTelefonos=$_POST['IdTelefonos'];
 	$Numero=$_POST['Numero'];
 	$Descripcion=$_POST['Descripcion'];

 	
 	$cnn=new mysqli("localhost", $username, $password, $database);
 	$SQL="
		UPDATE Telefonos
		SET 
			Numero='$Numero', 
			Descripcion='$Descripcion' 
			WHERE IdTelefonos=$IdTelefonos
 		";
 	$Tabla=$cnn->query("$SQL");
 	$cnn->Close();
 	header("Location: ../Personas/index.php");
?>