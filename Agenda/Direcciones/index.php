<html>
<body>
        <?php
			$username="root";
			$password="";
			$database="Agenda";
            $IdPersonas=base64_decode($_GET['Id']);
			$mysqli=new mysqli("localhost",$username,$password,$database);

			$query="
				SELECT *
				FROM Direcciones
				WHERE IdPersonas='$IdPersonas' 
			";

			$Tabla=$mysqli->query("$query");

			$mysqli->close(); 
        ?>
<TABLE border=1>
<TH>Nro</TH>
			<TH>CIUDAD</TH>
			<TH>ZONA</TH>
            <TH>RESIDENCIA</TH>
			<TH>OPCIONES</TH>

			<?php
			$n=1;
			while($Registro=$Tabla->fetch_assoc()){ 	?>

			<TR>
				<TD>	<?php 	echo($n);	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["Ciudad"]));	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["Zona"]));	?>	</TD>
				<TD>	<?php 	echo(utf8_encode($Registro["Residencia"]));	?>	</TD>
				

				<TD>
                    <a href="editar.php?Id=<?php	echo(base64_encode($Registro["IdDirecciones"]));?>">Editar</a>
					<a href="borrar.php?Id=<?php	echo(base64_encode($Registro["IdDirecciones"]));?>">Borrar</a>
				</TD>

			<?php	
			$n++;
			}	
			?>
	
		</TABLE>
		<a href="nuevo.php?Id=<?php	echo(base64_encode($IdPersonas));?>">Nuevo</a>
</body>
</html>