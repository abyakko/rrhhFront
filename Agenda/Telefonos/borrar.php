<?php
    $username="root";
	$password="";
	$database="Agenda";
    $IdTelefonos=base64_decode($_GET['Id']);
	$mysqli=new mysqli("localhost",$username,$password,$database);
	$query="
            DELETE 
            FROM Telefonos
            WHERE IdTelefonos=$IdTelefonos
            ";
    $mysqli->query("$query");
	$mysqli->close(); 
    header('Location:../Personas/index.php'); 
?>