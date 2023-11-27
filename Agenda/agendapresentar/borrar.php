<?php
    $IdPersona=$_GET['Id'];
    $username="root";
			$password="";
			$database="agenda";
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
                DELETE 
                FROM persona
                WHERE IdPersona=$IdPersona
            ";
            header('Location:index.php'); 
    
?>