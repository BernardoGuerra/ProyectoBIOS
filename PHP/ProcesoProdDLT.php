ç<?php
    // Proceso borrar productos
    
    // conectar al servidor de Base de datos
    include "../Conexion/conexion.php";
    // capturar datos del formulario
    $id          = ($_POST["id"]);
    // consulta
    $sql  = "DELETE FROM productos WHERE idProd=$id";
    
    // ejecutar consulta
    $ejecutar_consulta = mysqli_query($conexion,$sql);

    //mensajes de confirmacion
    if ($ejecutar_consulta) {
         $mje = "<span class='titERR'>Se eliminó correctamente el registro selecionado.</span>";
    }else{
        $mje = "<span class='titERR'>No se pudo eliminar el registro selecionado.</span>";
    }



    // cerrar conexión
    mysqli_close($conexion);                 
    // volver automáticamente al Formulario de UPD
    header("location: ProcProdVERTODO.php?MJE=$mje");
?>
