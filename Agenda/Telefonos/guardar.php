<?php
$IdPersonas=$_POST['IdPersonas'];
$Numero=$_POST['Numero'];
$Descripcion=$_POST['Descripcion'];

            $username="root";
			$password="";
			$database="Agenda";
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
				INSERT INTO Telefonos (IdPersonas,Numero,Descripcion)
				VALUES('$IdPersonas','$Numero','$Descripcion')
			";
            $mysqli->query("$query");
            $mysqli->close();
			
            header('Location:../Personas/index.php');
?>