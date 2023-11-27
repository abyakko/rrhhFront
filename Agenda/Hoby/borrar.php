<?php
    $username="root";
	$password="";
	$database="Agenda";
    $IdHoby=base64_decode($_GET['Id']);
	$mysqli=new mysqli("localhost",$username,$password,$database);
	$query="
            DELETE 
            FROM Hoby
            WHERE IdHoby=$IdHoby
            ";
    $mysqli->query("$query");
	$mysqli->close(); 
    header('Location:../Personas/index.php'); 
?>