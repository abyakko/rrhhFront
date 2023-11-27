<?php
$IdPersona=$_GET['Id'];
$Paterno=$_POST['Paterno'];
$Materno=$_POST['Materno'];
$Nombres=$_POST['Nombres'];
$Genero=$_POST['Genero'];
            $username="root";
			$password="";
			$database="agenda";
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
				
                UPDATE persona
                SET Paterno='$Paterno',
                    Materno='$Materno',
                    Nombres='$Nombres',
                    Genero='$Genero'
                WHERE IdPersona='$IdPersona'


			";
            $mysqli->query("$query");
            $mysqli->close();
            header('Location:index.php');

?>