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
?>



<div>
	<fieldset id="frm">
	<form id="Form" action="../PHP/ProcesoProdINS.php" method="POST">
	<table id="tablaFormINS">
		<tr>
			<th>Marca</th>
			<td>
				<input id="datoMarca" type="text" name="marca" maxlength="100" title="Máximo 100 caracteres">
			</td>
		</tr>
		<tr>
			<th>Descripción</th>
			<td>
				<input id="datoDescripcion" type="text" name="desc" maxlength="200" title="Máximo 200 caracteres">
			</td>
		</tr>
		<tr>
			<th>Origen</th>
			<td>
				<select id="datoOrigen" name="origen">
					<option value="">--------------</option>
				<option value="Estados Unidos">Estados Unidos</option>
				<option value="Alemania">Alemania</option>
				<option value="China">China</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Precio</th>
			<td>
				<input id="datoPrecio" type="number" name="precio" >
			</td>
		</tr>
		<tr>
			<th>Categoría</th>
			<td>
				<select id="datoCAT" name="cat" title="Seleccionar Categoría">
					<option value="">Seleccionar categoría</option>
					<?php
					include "../PHP/ListaCategorias.php";
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
          <input type="button" value="Insertar" onclick="CheckFormProd();"/>
          <input type="reset"  value="Cancelar" />        
        </td>
		</tr>
		
	</table>	
		
	</form>
	</fieldset>
</div>	

</body>
</html>