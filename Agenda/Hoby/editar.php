<html>

	<body>
		<?php
		    $username="root";
			$password="";
			$database="Agenda";
			
			$IdHoby=base64_decode($_GET['Id']);
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
            		SELECT *
            		FROM Hoby
            		WHERE IdHoby=$IdHoby
					";
			$Tabla=$mysqli->query("$query");
			$mysqli->close(); 
			while($Registro = $Tabla -> fetch_assoc()){

		?>
			<form action="actualizar.php" method="post">
				
			<input type="text" name="IdHoby" id="IdHoby"value="<?php echo(utf8_encode($IdHoby)); ?>">
			<br>

 		    

 		    <lavel for="Hoby" >Hoby </lavel>
			 <input type="text" name="Hoby" id="Hoby"value="<?php echo(utf8_encode($Registro["Hoby"])); ?>">
			 <br>

 		    
			 

 		    

				<input type="submit" value="Guardar">
  	          </form>
		   <?php
	}
?>
</body>
    </html>
