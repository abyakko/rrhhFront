<?php
    $username="root";
	$password="";
	$database="Agenda";
    $IdPersonas=base64_decode($_GET['Id']);
	$mysqli=new mysqli("localhost",$username,$password,$database);
	$query="
            DELETE 
            FROM Personas
            WHERE IdPersonas=$IdPersonas
            ";
    $mysqli->query("$query");
	$mysqli->close(); 
    header('Location:index.php'); 
?>