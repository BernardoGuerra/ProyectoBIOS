<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html">
	<meta charset="utf-8">
	<script type="text/javascript" src="../JS/Funciones.js"></script>
	<title>Insertar Producto</title>
	<link rel="stylesheet" href="../CSS/Estilos.css" />
</head>

<body>

<?php
	include "../Inc/menu.inc";
	include "../Conexion/conexion.php";

	$id = ($_GET["ID"]);


$sql = "SELECT * FROM categorias WHERE idCat=$id ";

$resultado = mysqli_query($conexion,$sql)or die ("Error en: $sql: " . mysqli_error($conexion) . " -" . mysqli_errno($conexion));

$lista=mysqli_fetch_array($resultado);
	$id = utf8_encode($lista["idCat"]);
    $categoria = utf8_encode($lista["tipoCat"]);
?>



<div>
	<fieldset id="frm">
	<form id="Form" action="ProcesoCatUPD.php" method="POST">
	<table id="tablaFormINS">

		<tr>
			<th>Categoría</th>
			<td>
				<input type="hidden" name="id" <?php echo "value='$lista[idCat]'"; 
				?> >
				<input id="datoCat" type="text" name="cat" maxlength="50" title="Máximo 50 caracteres" <?php echo utf8_encode("value='$lista[tipoCat] ' "); ?> />
			</td>
		</tr>

		<tr>
			<td colspan="2">
            <input type="button" value="Editar" onclick="CheckFormCat();"/>
          <input type="reset"  value="Cancelar" onclick="history.back(-1)" />        
        </td>
		</tr>
		
	</table>	
		
	</form>
	</fieldset>
</div>	

</body>
</html>
