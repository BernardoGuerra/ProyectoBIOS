<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html">
	<meta charset="utf-8">
	<script type="text/javascript" src="../JS/Funciones.js"></script>
	<title>Modificar producto</title>
	<link rel="stylesheet" href="../CSS/Estilos.css" />
</head>
<body>

<?php
	include "../Inc/menu.inc";
	include "../Conexion/conexion.php";

	$id = ($_GET["ID"]);


$sql = "SELECT * FROM productos AS p JOIN categorias AS c ON p.idCatProd=c.idCat WHERE p.idProd=$id ";

$resultado = mysql_query($sql, $conexion)or die ("Error en: $sql: " . mysql_error() . " -" . mysql_errno());

$lista=mysql_fetch_array($resultado);
	$id = utf8_encode($lista["idProd"]);
        $marca = utf8_encode($lista["marcaProd"]);
        $descripcion = utf8_encode($lista["descProd"]);
        $procedencia = utf8_encode($lista["origenProd"]);
        $precio = $lista["precioProd"];
        $categoria = utf8_encode($lista["tipoCat"]);
        $idcatprod = $lista["idCatProd"];
        $idcat 	   = $lista["idCat"];	
?>



<div>
	<fieldset id="frm">
	<legend>Eliminar registro</legend>	
	<form id="Form" action="ProcesoProdDLT.php" method="POST">
	<table id="tablaFormINS">

		<tr>
			<th>Marca</th>
			<td>
				<input type="hidden" name="id"  <?php echo "value='$lista[idProd]'"; 
				?> >
				<input id="datoMarca" type="text" name="marca" maxlength="100" title="Máximo 100 caracteres" disabled="true" 
				<?php echo utf8_encode("value='$lista[marcaProd] ' "); ?> />
			</td>
		</tr>

		<tr>
			<th>Descripción</th>
			<td>
				<input id="datoDescripcion" type="text" name="desc" maxlength="200" title="Máximo 200 caracteres" disabled="true"
				<?php echo utf8_encode("value='$lista[descProd] ' "); ?>
				>
			</td>
		</tr>
		<tr>

			<th>Origen</th>
			<td>
				<select id="datoOrigen" name="origen" disabled="true">
				<?php 
							
				echo "<option value='$procedencia' selected>$procedencia</option>";
				echo "<option value='Alemania'>Alemania</option>";
				echo "<option value='Estados Unidos'>Estados Unidos</option>";
				echo "<option value='China'>China</option>";


				?>    
				</select>
			</td>
		</tr>

		<tr>
			<th>Precio</th>
			<td>
				<input id="datoPrecio" type="number" name="precio" 
				caracteres" disabled="true" 
				<?php echo "value='$lista[precioProd]'"; 
				?>
				>
			</td>
		</tr>
		
		<tr>
			<th>Categoría</th>
			<td>
				<select id="datoCAT" name="cat" disabled="true">

				<?php 
				echo "<option value='$idcat' selected>$categoria</option>";
				include "../PHP/ListaCategorias.php";
				?>	

				</select>
			</td>
		</tr>

		<tr>
			<td colspan="2">
          <input type="button" value="Eliminar" onclick="ConfirmDEL();"/>
          <input type="reset"  value="Cancelar" onclick="history.back(-1)" />        
        </td>
		</tr>
		
	</table>	
	</form>
	</fieldset>
</div>	

</body>
</html>