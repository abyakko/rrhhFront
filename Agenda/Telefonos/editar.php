<html>

	<body>
		<?php
		    $username="root";
			$password="";
			$database="Agenda";
			
			$IdTelefono=base64_decode($_GET['Id']);
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
            		SELECT *
            		FROM Telefonos
            		WHERE IdTelefonos=$IdTelefono
					";
			$Tabla=$mysqli->query("$query");
			$mysqli->close(); 
			while($Registro = $Tabla -> fetch_assoc()){

		?>
			<form action="actualizar.php" method="post">
				
			<input type="text" name="IdTelefonos" id="IdTelefonos"value="<?php echo(utf8_encode($IdTelefono)); ?>">
			<br>

 		    

 		    <lavel for="Numero" >Numero </lavel>
			 <input type="text" name="Numero" id="Zona"value="<?php echo(utf8_encode($Registro["Numero"])); ?>">
			 <br>

 		    <lavel for="Descripcion" >Descripcion </lavel>
			 <input type="text" name="Descripcion" id="Descripcion"value="<?php echo(utf8_encode($Registro["Descripcion"])); ?>">
			 <br>

			 

 		    

				<input type="submit" value="Guardar">
  	          </form>
		   <?php
	}
?>
</body>
    </html>
