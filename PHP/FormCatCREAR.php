<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html">
	<meta charset="utf-8">
	<script type="text/javascript" src="../JS/Funciones.js"></script>
	<title>Categorías</title>
	<link rel="stylesheet" href="../CSS/Estilos.css" />
</head>
<body>


<?php
	include "../Inc/menu.inc";
	include "../Conexion/conexion.php";
?>


<div>
	<fieldset id="frm">


		
	<form id="Form" action="../PHP/ProcesoCatCREAR.php" method="POST">
	<table id="tablaCatCREAR">
		<tr>
			<th>Categoría</th>
			<td>
				<input id="datoCat" type="text" name="Categ" maxlength="50" title="Máximo 50 caracteres">
			</td>
		
    </tr>
    <td colspan="2">
   	<input type="button" value="Crear" onclick="CheckFormCat();"/>
    <input type="reset"  value="Cancelar" />        
        </td>
	</table>	
	</form>
	</fieldset>

	<div id="contenido">
	<fieldset id="dsc">
		<legend>Listado</legend>
		<table id="lst">

		<?php
		//verifica si existe mensaje que se emite al cargar o modificar algun registro
		if (isset($_GET["MJE"])) {
            $mje = $_GET["MJE"];
            echo "<p>$mje</p>";   
        }


		if (isset($_GET["ORD"])){
			$orden = $_GET["ORD"];
		} else {
			$orden = "tipoCat";	
		}//endif

		$sql = "SELECT * FROM categorias ORDER BY $orden";	
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
				<a href='FormCatCREAR.php?ORD=idCat'>	ID
				</th>
				<th>
				<a href='FormCatCREAR.php?ORD=tipoCat'>	Categoría
				</th>
				<th></th>
			</tr>
		     ";

		$fila=1;
		while ($regCat=mysql_fetch_array($result)) {
				$id = utf8_encode($regCat["idCat"]);
				$categoria = utf8_encode($regCat["tipoCat"]);
			$resto = $fila%2;
            if ($resto==0) {
                echo "<tr class='filaPAR'>\n";
            } else {
                echo "<tr class='filaIMP'>\n";
            } // endif

            echo "<td>$id</td></br>";
			echo "<td>$categoria</td></br>";
			
				echo "<td align='center'><a href='FormCatUPD.php?ID=$id'><img src='../Img/editar.png' width='20' height='20' title='Eliminar registro'></a></br></td>";

			$fila++;
		}

		?>

		</table>
	</fieldset>
	</div>	



</body>
</html>