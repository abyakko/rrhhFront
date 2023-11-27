<?php
$Paterno=$_POST['Paterno'];
$Materno=$_POST['Materno'];
$Nombres=$_POST['Nombres'];
$Genero=$_POST['Genero'];
            $username="root";
			$password="";
			$database="agenda";
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
				INSERT INTO persona (Paterno,Materno,Nombres,Genero)
				VALUES('$Paterno','$Materno','$Nombres','$Genero')
			";
            $mysqli->query("$query");
            $mysqli->close();
            header('Location:index.php');

?>