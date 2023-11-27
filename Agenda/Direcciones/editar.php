<html>

	<body>
		<?php
		    $username="root";
			$password="";
			$database="Agenda";
			$Li="img/";
			$IdPersona=base64_decode($_GET['Id']);
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
            		SELECT *
            		FROM Personas
            		WHERE IdPersonas=$IdPersona
					";
			$Tabla=$mysqli->query("$query");
			$mysqli->close(); 
			while($Registro = $Tabla -> fetch_assoc()){

		?>
			<form action="actualizar.php" method="post">
				
			<input type="hidden" name="IdPersonas" id="Paterno"value="<?php echo(utf8_encode($IdPersona)); ?>">
			<br>

 		    <lavel for="Paterno" >Apellido Paterno </lavel>
			 <input type="text" name="Paterno" id="Paterno"value="<?php echo(utf8_encode($Registro["Paterno"])); ?>">
			 <br>

 		    <lavel for="Materno" >Apellido Materno </lavel>
			 <input type="text" name="Materno" id="Materno"value="<?php echo(utf8_encode($Registro["Materno"])); ?>">
			 <br>

 		    <lavel for="Nombres" >Nombre </lavel>
			 <input type="text" name="Nombres" id="Nombres"value="<?php echo(utf8_encode($Registro["Nombres"])); ?>">
			 <br>

			 <label for="Genero">Genero:</label>
			<select name="Genero">
				<option values="Genero"><?php echo(utf8_encode($Registro["Genero"])); ?></option>
				<option values="Masculino">Masculino</option>
				<option values="Femenino">Femenino</option>
			</select>
			<br>

 		    <label for="EstCiv">Estado Civil:</label>
			<select name="EstCiv">
				<option values="Soltero"><?php echo(utf8_encode($Registro["EstCiv"])); ?></option>
				<option values="Soltero">Soltero</option>
				<option values="Casado">Casado</option>
				<option values="Viudo">Viudo</option>
				<option values="Otro">Otro</option>
			</select>
			<br>

			<label for="FecNac">Fecha de Nacimiento:</label>
 		 	<input type="date" name="FecNac" value="<?php echo(utf8_encode($Registro["FecNac"])); ?>">
			<br>

			<TABLE border=1>
				 <TH>FOTO</TH> 
				 <TR>

					 <TD><img src="<?php 	echo(utf8_encode($Registro["Foto"]));	?>" alt="">		</TD> 
					 
				 </TR>
				 
			</TABLE>

			<label for="Foto2">cambiar Foto:</label>
					 <input type="file" name="Foto2">
				<br>
				<input type="submit" value="Guardar">
  	          </form>
		   <?php
	}
?>
</body>
    </html>
