<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html">
	<meta charset="utf-8">
	<script type="text/javascript" src="../JS/Funciones.js"></script>
	<title>Buscar por Categoría & Origen</title>
	<link rel="stylesheet" href="../CSS/Estilos.css" />
</head>
<body>
<?php
	include "../Inc/menu.inc";
?>
<div id="menu">
	
         <a href="ProcProdVERTODO.php">Lista completa</a><span>&nbsp;- &nbsp;</span>
<a href="FormCatVER.php">Búsqueda por categoría</a>
<span>&nbsp;- &nbsp;</span>
<a href="FormOrigVER.php">Búsqueda por origen</a>
<span>&nbsp;- &nbsp;</span>
<a href="FormCatOrigVER.php">Búsqueda por origen & categoría</a>
    </div>


<?php
	include "../Inc/menuFormCatOrigVER.inc";

?>



</body>
</html>