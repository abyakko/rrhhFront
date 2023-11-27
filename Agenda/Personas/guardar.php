<?php
$Paterno=$_POST['Paterno'];
$Materno=$_POST['Materno'];
$Nombres=$_POST['Nombres'];
$Genero=$_POST['Genero'];
$EstCiv=$_POST['EstCiv'];
$FecNac=$_POST['FecNac'];
$Foto=$_POST['Foto'];
$LI="img/";
            $username="root";
			$password="";
			$database="Agenda";
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
				INSERT INTO Personas (Paterno,Materno,Nombres,Genero,FecNac,EstCiv,Foto)
				VALUES('$Paterno','$Materno','$Nombres','$Genero','$FecNac','$EstCiv','$LI$Foto')
			";
            $mysqli->query("$query");
            $mysqli->close();
            header('Location:index.php');

?>