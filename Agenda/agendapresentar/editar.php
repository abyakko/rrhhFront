<?php
    $IdPersona=$_GET['Id'];
    echo($IdPersona);
    $username="root";
			$password="";
			$database="agenda";
			$mysqli=new mysqli("localhost",$username,$password,$database);
			$query="
            SELECT IdPersona
            FROM persona
            WHERE=IdPersona='$IdPersona'
			";
    
?>
<html>
<center><h2>actualizar Datos</h2>
 	  	  <form action="actualizar.php" method="POST">
 		       <label for="Paterno">Apellido Paterno:</label>
 		 	<input type="text" name="Paterno" value="<?php echo($IdPersona); ?>">
 	  	 	<label for="Materno">Apellido Materno:</label>
 	 	 	<input type="text" name="Materno">
 		 	<label for="Nombres">Nombre Completos:</label>
                 	<input type="text" name="Nombres">
 		 	<label for="Genero">Genero:</label>
 		 	<input type="text" name="Genero">
 		 	<input type="submit" >
  	          </form>
           </center>
    </html>
