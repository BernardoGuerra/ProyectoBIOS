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
         <a href="ProcProdVERTODO.php">Lista completa</a><span>&nbsp;-&nbsp;</span>
        <a href="FormCatVER.php">Búsqueda por categoría</a>
        <span>&nbsp;-&nbsp;</span>
        <a href="FormOrigVER.php">Búsqueda por origen</a>
        <span>&nbsp;- &nbsp;</span>
        <a href="FormCatOrigVER.php">Búsqueda por origen & categoría</a>
    </div>
   


<div id="contenido">
    <fieldset id="dsc">
        <legend>Listado</legend>
        <table id="lst">

<?php

if (isset($_GET["ORD"])){
            $orden = $_GET["ORD"];
        } else {
            $orden = "idProd";  
        }//endif 



   $cat = utf8_decode($_GET["ORIG"]);
    
    
    if (empty($cat)) {
      echo  "<p>Seleccionar origen</P>";
    }else{

        
if (isset($_GET["ORD"])){
            $orden = $_GET["ORD"];
        } else {
            $orden = "idProd";  
        }//endif 

        //consulta
        $sql = "SELECT * FROM productos AS p JOIN categorias AS c WHERE (p.origenProd='$cat' AND c.idCat=p.idCatProd) ORDER BY $orden";


    // ejecutar sentencia SQL
    $resultado = mysqli_query($conexion, $sql) or die ("Error en: $sql: " . mysqli_error($conexion) . " -" . mysqli_errno($conexion));

  $num_regs = mysqli_num_rows($resultado);

    if ($num_regs==0) {
            // enviar aviso
            echo "<span class='titERR'>No fueron hallados registros para la búsqueda realizada.</span>" ;
        }else{
            echo "<span class='titERR'>Se halló un total de $num_regs registros para la búsqueda realizada.</span>" ;
        }


    echo "
                <tr>
                    <th>
                    <a href='ProcesoOrigVER.php?ORD=idProd&ORIG=$cat'>
                    ID
                    </th> 

                    <th>
                    Origen
                   </th>

                   <th>
                    <a href='ProcesoOrigVER.php?ORD=tipoCat&ORIG=$cat'>
                    Categoria
                    </th>

                    <th>
                    <a href='ProcesoOrigVER.php?ORD=marcaProd&ORIG=$cat'>
                    Marca
                    </th>

                    <th>
                    <a href='ProcesoOrigVER.php?ORD=descProd&ORIG=$cat'>
                    Descripción
                    </th>

                    <th>
                    <a href='ProcesoOrigVER.php?ORD=precioProd&ORIG=$cat'>
                    Precio
                    </th>

                    <th>
                    
                    </th>
                    <th>
                    
                    </th>
                
                    
                </tr>
        ";        


     $fila=1;   
     while ($lista=mysqli_fetch_array($resultado)) { 
        // convertir datos
        $id = utf8_encode($lista["idProd"]);
        $descripcion = utf8_encode($lista["descProd"]);
        $procedencia = utf8_encode($lista["origenProd"]);
        $marca = utf8_encode($lista["marcaProd"]);
        $precio = utf8_encode($lista["precioProd"]);
        $categoria = utf8_encode($lista["tipoCat"]);
        // crear option


        $resto = $fila%2;
            if ($resto==0) {
                echo "<tr class='filaPAR'>\n";
            } else {
                echo "<tr class='filaIMP'>\n";
            } // endif


            echo "<td>$id</td></br>";
            echo "<td>$procedencia</td></br>";
            echo "<td>$categoria</td></br>";    
            echo "<td>$marca</td></br>";
            echo "<td>$descripcion</td></br>";
            echo "<td>$precio</td></br>";
            echo "<td align='center'><a href='FormProdDLT.php?ID=$id'><img src='../Img/Icon-trash.png' width='20' height='20' title='Eliminar registro'></a></br></td>";
                echo "<td align='center'><a href='FormProdUPD.php?ID=$id'><img src='../Img/editar.png' width='20' height='20' title='Eliminar registro'></a></br></td>";

            

            $fila++;    
   


    } // end while

    }

        
?>

    </table>
    </fieldset>
</div>

</body>
</html>
