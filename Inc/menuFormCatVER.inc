<div>
	<fieldset id="frm">
	<form id="verCatForm" action="../PHP/ProcesoCatVER.php"  method="GET">
	<table id="tablaCatVER">
					
		<tr>
			<th>Categoría</th>
			<td>
				<select id="datoCAT" name="CAT" title="Seleccionar Categoría">
					<option value="0">Seleccionar categoría</option>
					<?php
					include "../PHP/ListaCategorias.php";
					?>
				</select>
			</td>
		</tr>
		
		<tr>
		<td>
				<input type="submit" value="Buscar">
		</td>
		</tr>		
		
	</table>			
	</form>
	</fieldset>
</div>	