/* Chequea datos del formulario de creación de categorías */
function CheckFormCat() {
    // preparar mensaje y control de error
    var mensaje = "Los campos no pueden estar vacíos. Ingrese los siguientes datos:\n";
    var error   = false;
    // capturar datos del formulario
    var categoria   = document.getElementById("datoCat").value;
    // validar datos
    if (categoria=="") {
        error   = true;
        mensaje = mensaje+"Categoría\n";
    } // endif
   
    // controlar error
    if (error) {
        // mostrar mensaje 
        window.alert(mensaje); 
    } else {
        // enviar formulario
        document.getElementById("Form").submit();
    } // endif 
} // end function

function CheckFormProd() {
    // preparar mensaje y control de error
    var mensaje = "Los campos no pueden estar vacíos. Ingrese los siguientes datos:\n";
    var error   = false;
    // capturar datos del formulario
    var marca   = document.getElementById("datoMarca").value;
    var descripcion   = document.getElementById("datoDescripcion").value;
    var origen   = document.getElementById("datoOrigen").value;
    var precio   = document.getElementById("datoPrecio").value;
    var categoria   = document.getElementById("datoCAT").value;

    // validar datos
    if (marca=="") {
        error   = true;
        mensaje = mensaje+"Marca\n";
    } // endif
      if (descripcion=="") {
        error   = true;
        mensaje = mensaje+"Descripción\n";
    } // endif
      if (origen=="") {
        error   = true;
        mensaje = mensaje+"Origen\n";
    } // endif
      if (precio=="") {
        error   = true;
        mensaje = mensaje+"Precio\n";
    } // endif
      if (categoria=="") {
        error   = true;
        mensaje = mensaje+"Categoria\n";
    } // endif
    if (categoria=="") {
        error   = true;
        mensaje = mensaje+"Categoria\n";
    } // endif
   
    // controlar error
    if (error) {
        // mostrar mensaje 
        window.alert(mensaje); 
    } else {
        // enviar formulario
        document.getElementById("Form").submit();
        
    } // endif 
} // end function

function ConfirmDEL() {
    // pedir confirmación para eliminar
    var confirma = window.confirm("¿Es seguro que desea eliminar el registro?");
    // evaluar
    if (confirma) {
        // enviar formulario
        document.getElementById("Form").submit();
    }else{
        history.back(-1);
    } // endif
}//en function