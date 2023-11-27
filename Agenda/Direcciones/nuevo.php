<html>
       <head>
 	<title>Registro De Direcciones
 	</title>
 	</head>
    <body>

<!-- ESTRUCTURA DEL FORMULARIO -->
<?php
$IdPersonas=base64_decode($_GET['Id']);
?>
           <center><h2>Registro De Direcciones</h2>
 	  	  <form action="guardar.php" method="POST">

			 <input type="text" name="IdPersonas" id="Paterno"value="<?php echo(utf8_encode($IdPersonas)); ?>">
			<br>

			 <label for="Ciudad">Ciudad:</label>
			<select name="Ciudad">
				<option values="La Paz">La Paz</option>
				<option values="El Alto">El Alto</option>
				<option values="SantaCruz">SantaCruz</option>
				<option values="Beni">Beni</option>
				<option values="Pando">Pando</option>
				<option values="Cochabamba">Cochabamba</option>
				<option values="Tarija">Tarija</option>
				<option values="Potosi">Potosi</option>
				<option values="Chuquisaca">Chuquisaca</option>
				<option values="Pando">Pando</option>
			</select>
			<br>

			<label for="Zona">Zona:</label>
 	 	 	<input type="text" name="Zona">
			<br>

 		    <label for="Residencia">Residencia</label>
 		 	<input type="text" name="Residencia">
			<br>


 		 	<input type="submit" >
  	          </form>
           </center>
     </body>
</html>