<?php
 	$username="root";
 	$password="";
 	$database="Agenda";
 	$IdPersonas=$_POST['IdPersonas'];
 	$Paterno=$_POST['Paterno'];
 	$Materno=$_POST['Materno'];
 	$Nombres=$_POST['Nombres'];
 	$Genero=$_POST['Genero'];
 	$EstCiv=$_POST['EstCiv'];
 	$FecNac=$_POST['FecNac'];
 	$Foto=$_POST['Foto2'];
 	$LI="img/";
 	$cnn=new mysqli("localhost", $username, $password, $database);
 	$SQL="
		UPDATE Personas
		SET 
			Paterno='$Paterno', 
			Materno='$Materno', 
			Nombres='$Nombres', 
			Genero='$Genero',
			EstCiv='$EstCiv', 
			FecNac='$FecNac', 
			Foto='$LI$Foto'
			WHERE IdPersonas=$IdPersonas
 		";
 	$Tabla=$cnn->query("$SQL");
 	$cnn->Close();
 	header("Location: index.php");
?>