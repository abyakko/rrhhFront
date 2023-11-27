<html>
       <head>
 	<title>Registro De Personas
 	</title>
 	</head>
    <body>




           <center><h2>Registro De Personas</h2>
 	  	  <form action="guardar.php" method="POST">

 		    <label for="Paterno">Apellido Paterno:</label>
 		 	<input type="text" name="Paterno">
			<br>

 	  	 	<label for="Materno">Apellido Materno:</label>
 	 	 	<input type="text" name="Materno">
			<br>

 		 	<label for="Nombres">Nombre Completos:</label>
            <input type="text" name="Nombres">
			<br>

			<label for="Genero">Genero:</label>
 		 	<select name="Genero">
				<option values="Masculino">Masculino</option>
				<option values="Femenino">Femenino</option>
			</select>
			<br>

			<label for="EstCiv">Estado Civil:</label>
			<select name="EstCiv">
				<option values="Soltero">Soltero</option>
				<option values="Casado">Casado</option>
				<option values="Viudo">Viudo</option>
				<option values="Otro">Otro</option>
			</select>
			<br>

			<label for="FecNac">Fecha de Nacimiento:</label>
 		 	<input type="date" name="FecNac">
			<br>

			<label for="Foto">Foto:</label>
 	 	 	<input type="file" name="Foto">
			<br>

 		 	<input type="submit" >
  	          </form>
           </center>
     </body>
</html>