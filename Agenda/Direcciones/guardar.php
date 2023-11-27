<?php
$IdPersonas=$_POST['IdPersonas'];
$Ciudad=$_POST['Ciudad'];
$Zona=$_POST['Zona'];
$Residencia=$_POST['Residencia'];
            $username="root";
			$password="";
			$database="Agenda";
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
				INSERT INTO Direcciones (IdPersonas,Ciudad,Zona,Residencia)
				VALUES('$IdPersonas','$Ciudad','$Zona','$Residencia')
			";
            $mysqli->query("$query");
            $mysqli->close();
			
            header('Location:../Personas/index.php');
?>