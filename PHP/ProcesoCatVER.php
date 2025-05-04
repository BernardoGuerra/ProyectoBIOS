<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html">
    <meta charset="utf-8">
    <script type="text/javascript" src="../JS/Funciones.js"></script>
    <title>Búsqueda por categorías</title>
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



if (isset($_GET["ORD"])){
            $orden = $_GET["ORD"];
        } else {
            $orden = "idCat";  
        }//endif 

    $cat = utf8_decode($_GET["CAT"]);
    
    if ($cat==0) {
        echo  "<p>Seleccionar Categoría</P>";
    }else{

        


        $sql = "SELECT * FROM productos AS p JOIN categorias AS c WHERE (c.idCat=$cat AND c.idCat=p.idCatProd) ORDER BY $orden";
    // ejecutar sentencia SQL
    $resultado = mysql_query($sql ,$conexion) ;
    $num_regs = mysql_num_rows($resultado);

    if ($num_regs==0) {
            // enviar aviso
            echo "<span class='titERR'>No fueron hallados registros para la búsqueda realizada.</span>" ;
        }else{
            echo "<span class='titERR'>Se halló un total de $num_regs registros para la búsqueda realizada.</span>" ;
        }

     



    echo "
                <tr>
                    <th>
                    <a href='ProcesoCatVER.php?ORD=idCat&CAT=$cat'>ID
                    </th> 

                    <th>
                    <a href='ProcesoCatVER.php?ORD=tipoCat&CAT=$cat'>Categoría
                    </th>


                    <th>
                    <a href='ProcesoCatVER.php?ORD=marcaProd&CAT=$cat'>Marca
                    </th>
                    

                
                    <th>
                    <a href='ProcesoCatVER.php?ORD=descProd&CAT=$cat'>Producto
                    </th>

                    <th>
                    <a href='ProcesoCatVER.php?ORD=origenProd&CAT=$cat'>Origen
                    </th>

                    <th>
                    <a href='ProcesoCatVER.php?ORD=precioProd&CAT=$cat'>Precio
                    </th>

                    <th>
                    
                    </th>
                    <th>
                    
                    </th>
                </tr>
        ";        


     $fila=1;   
     while ($lista=mysql_fetch_array($resultado)) {
        // convertir datos
        $id = utf8_encode($lista["idProd"]);
        $categoria = utf8_encode($lista["tipoCat"]);
        $producto = utf8_encode($lista["descProd"]);
        $marca = utf8_encode($lista["marcaProd"]);
        $origen = utf8_encode($lista["origenProd"]);
        $precio = utf8_encode($lista["precioProd"]);

        // crear option
        


        $resto = $fila%2;
            if ($resto==0) {
                echo "<tr class='filaPAR'>\n";
            } else {
                echo "<tr class='filaIMP'>\n";
            } // endif


            echo "<td>$id</td></br>";
            echo "<td>$categoria</td></br>";
            echo "<td>$marca</td></br>";
            echo "<td>$producto</td></br>";    
            echo "<td>$origen</td></br>";
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
