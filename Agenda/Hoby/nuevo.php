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
           <center><h2>Registro De Telefonos</h2>
 	  	  <form action="guardar.php" method="POST">

			 <input type="text" name="IdPersonas" id="Paterno"value="<?php echo(utf8_encode($IdPersonas)); ?>">
			<br>

			 

			<label for="Hoby">Hoby:</label>
 	 	 	<input type="text" name="Hoby">
			<br>

 		    


 		 	<input type="submit" >
  	          </form>
           </center>
     </body>
</html>