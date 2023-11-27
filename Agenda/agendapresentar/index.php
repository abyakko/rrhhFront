<html>
	<body>
		<?php
			$username = "root";
			$password = "";
			$database="agenda";

			$mysqli=new mysqli("localhost",$username,$password,$database);

			$query="
				SELECT IdPersona,Paterno,Materno,Nombres,Genero
				FROM persona
				ORDER BY Paterno,Materno,Nombres
			";

			$Tabla=$mysqli->query("$query");

			$mysqli->close(); ?>

			<TABLE border=1>
			<TH>Nro</TH>
<TH>Id</TH>
			<TH>PATERNO</TH>
			<TH>MATERNO</TH>
			<TH>NOMBRES</TH>
			<TH>GENERO</TH>
			<TH>OPCIONES</TH>




			<?php
			$n=1;
			while($Registro=$Tabla->fetch_assoc()){ 	?>

			<TR>
				<TD>	<?php 	echo($n);	?>	</TD>
				<TD>	<?php 	echo($Registro["IdPersona"]);	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["Paterno"]));	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["Materno"]));	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["Nombres"]));	?>	</TD>
				<TD>	<?php 	echo($Registro["Genero"]);	?>	</TD>

				<TD>
                    <a href="editar.php?Id=<?php	echo($Registro["IdPersona"]);?>">Editar</a>
					<a href="borrar.php?Id=<?php	echo($Registro["IdPersona"]);?>">Borrar</a>
			
				</TD>

			<?php	
			$n++;
			}	
			?>
	
		</TABLE>
<a href="nuevo.php">Nuevo</a>
		
	</body>
</html>