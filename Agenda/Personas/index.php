<html>
	<body>
		<?php
			$username="root";
			$password="";
			$database="Agenda";

			$mysqli=new mysqli("localhost",$username,$password,$database);

			$query="
				SELECT *
				FROM Personas
				ORDER BY Paterno,Materno,Nombres
			";

			$Tabla=$mysqli->query("$query");

			$mysqli->close(); ?>

			<TABLE border=1>
			<TH>Nro</TH>
			<TH>PATERNO</TH>
			<TH>MATERNO</TH>
			<TH>NOMBRES</TH>
			<TH>GENERO</TH>
			<TH>ESTADO CIVIL</TH>
			<TH>FECHA NAC</TH>
			 <!-- <TH>FOTO</TH> -->
			<TH>OPCIONES</TH>




			<?php
			$n=1;
			while($Registro=$Tabla->fetch_assoc()){ 	?>

			<TR>
				<TD>	<?php 	echo($n);	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["Paterno"]));	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["Materno"]));	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["Nombres"]));	?>	</TD>
				<TD>	<?php 	echo($Registro["Genero"]);	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["EstCiv"]));	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["FecNac"]));	?>	</TD>
				<!-- <TD>	<?php 	echo(utf8_encode($Registro["Foto"]));	?>	</TD> -->				
						


				<TD>
                    <a href="editar.php?Id=<?php	echo(base64_encode($Registro["IdPersonas"]));?>">Editar</a>
					<a href="borrar.php?Id=<?php	echo(base64_encode($Registro["IdPersonas"]));?>">Borrar</a>
					<a href="../Direcciones/index.php?Id=<?php	echo(base64_encode($Registro["IdPersonas"]));?>">Direcciones</a>
					<a href="../Telefonos/index.php?Id=<?php	echo(base64_encode($Registro["IdPersonas"]));?>">Telefonos</a>
					<a href="../Hoby/index.php?Id=<?php	echo(base64_encode($Registro["IdPersonas"]));?>">Hoby</a>
				</TD>

			<?php	
			$n++;
			}	
			?>
	
		</TABLE>
<a href="nuevo.php">Nuevo</a>
		
	</body>
</html>