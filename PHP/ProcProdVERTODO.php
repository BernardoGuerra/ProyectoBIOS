<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html">
	<meta charset="utf-8">
	<script type="text/javascript" src="../JS/Funciones.js"></script>
	<title>Lista completa</title>
	<link rel="stylesheet" href="../CSS/Estilos.css" />
</head>
<body>

<?php
	include "../Inc/menu.inc";
	include "../Conexion/conexion.php";
?>

<div id="menu">
         <a href="ProcProdVERTODO.php">Lista completa</a><span>&nbsp;- &nbsp;</span>
<a href="FormCatVER.php">Búsqueda por categoría</a>
<span>&nbsp;- &nbsp;</span>
<a href="FormOrigVER.php">Búsqueda por origen</a>
<span>&nbsp;- &nbsp;</span>
<a href="FormCatOrigVER.php">Búsqueda por origen & categoría</a>
    </div>

<div id="contenido">
	<fieldset id="dsc">
		<legend>Listado</legend>
		<table id="lst">
			
	<?php
				if (isset($_GET["MJE"])) {
            $mje = $_GET["MJE"];
            echo "<p>$mje</p>";   
        }

		if (isset($_GET["ORD"])){
			$orden = $_GET["ORD"];
		} else {
			$orden = "idProd";	
		}//endif

		$sql = "SELECT p.idProd, p.marcaProd, p.descProd, p.origenProd, p.precioProd, c.tipoCat FROM productos AS p JOIN categorias AS c ON p.idCatProd=c.idCat ORDER BY $orden";

		$result = mysql_query($sql,$conexion) or die("Error en: $sql: " . mysql_error());

		 $num_regs = mysql_num_rows($result);



    if ($num_regs==0) {
            // enviar aviso
            echo "<span class='titERR'>No fueron hallados registros para la búsqueda realizada.</span>" ;
        }else{
            echo "<span class='titERR'>Se halló un total de $num_regs registros para la búsqueda realizada.</span>" ;
        }


		echo "
				<tr>
				    <th>
					<a href='ProcProdVERTODO.php?ORD=idProd'>ID
					</th> 

					<th>
					<a href='ProcProdVERTODO.php?ORD=tipoCat'>Categoría
					</th>

					<th>
					<a href='ProcProdVERTODO.php?ORD=marcaProd'>Marca
					</th>
				
					<th>
					<a href='ProcProdVERTODO.php?ORD=descProd'>Descripción
					</th>

					<th>
					<a href='ProcProdVERTODO.php?ORD=origenProd'>Origen
					</th>

					<th>
					<a href='ProcProdVERTODO.php?ORD=precioProd'>Precio
					</th>

					
					<th>
					</th>
					
					<th>
					</th>
				</tr>

			";
		$fila=1;
		while ($regProd=mysql_fetch_array($result)) {
				$id = utf8_encode($regProd["idProd"]);
				$producto = utf8_encode($regProd["marcaProd"]);
				$descripcion = utf8_encode($regProd["descProd"]);
				$origen = utf8_encode($regProd["origenProd"]);
				$precio = utf8_encode($regProd["precioProd"]);
				$categoria = utf8_encode($regProd["tipoCat"]);
				
				$resto = $fila%2;
            if ($resto==0) {
                echo "<tr class='filaPAR'>\n";
            } else {
                echo "<tr class='filaIMP'>\n";
            } // endif

            	

				echo "<td>$id</td></br>";
				echo "<td>$categoria</td></br>";
				echo "<td>$producto</td></br>";
				echo "<td>$descripcion</td></br>";
				echo "<td>$origen</td></br>";
				echo "<td>$precio</td></br>";
				

				echo "<td align='center'><a href='FormProdDLT.php?ID=$id'><img src='../Img/Icon-trash.png' width='20' height='20' title='Eliminar registro'></a></br></td>";
				echo "<td align='center'><a href='FormProdUPD.php?ID=$id'><img src='../Img/editar.png' width='20' height='20' title='Eliminar registro'></a></br></td>";

				
				
			

				$fila++;

			}
			//cerras conexion
			mysql_close($conexion);
			


		?>


		</table>
	</fieldset>
</div>
</body>
</html>