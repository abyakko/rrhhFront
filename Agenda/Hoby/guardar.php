<?php
$IdPersonas=$_POST['IdPersonas'];
$Hoby=$_POST['Hoby'];


            $username="root";
			$password="";
			$database="Agenda";
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
				INSERT INTO Hoby (IdPersonas,Hoby)
				VALUES('$IdPersonas','$Hoby')
			";
            $mysqli->query("$query");
            $mysqli->close();
			
            header('Location:../Personas/index.php');
?>