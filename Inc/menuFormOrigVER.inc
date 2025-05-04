<div>
	<fieldset id="frm">
	<form id="verOrigForm" action="../PHP/ProcesoOrigVER.php"  method="GET">
	<table id="tablaCatVER">
					
		<tr>
			<th>Origen</th>
			<td>
				<select id="datoORIG" name="ORIG" title="Seleccionar Origen">
					<option value="">Seleccionar origen</option>
					<?php
					include "../PHP/ListaOrigen.php";
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