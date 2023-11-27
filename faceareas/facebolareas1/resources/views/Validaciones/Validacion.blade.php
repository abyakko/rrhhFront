<? function javascript() { ?>
<script language="JavaScript">
    //funcion para que solo se pueda escribir numeros
function SoloNumeros(e) {

    var key;
    
    if (window.event) 
    {
        key = e.keyCode;
    }
    else if (e.which) 
    {
        key = e.which;
    }
    
    if (key < 48 || key > 57 ) {
        return false;
    }
    
    return true;
    }
    //funcion para que solo se pueda escribir letras
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];
    
    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
}
//
// Obtener el elemento de entrada y agregar el evento keyup
var searchInput = document.getElementById("searchInput");
searchInput.addEventListener("keyup", function() {
    buscarOpciones(searchInput.value);
});

// Función de búsqueda para filtrar las opciones del select
function buscarOpciones(searchValue) {
    // Obtener el elemento select y las opciones
    var select = document.getElementById("empresa_id");
    var options = select.getElementsByTagName("option");

    // Convertir el valor de búsqueda a mayúsculas para realizar una búsqueda insensible a mayúsculas y minúsculas
    var filter = searchValue.toUpperCase();

    // Iterar sobre las opciones y ocultar/mostrar según el filtro de búsqueda
    for (var i = 0; i < options.length; i++) {
        var option = options[i];
        var text = option.textContent || option.innerText;
        if (text.toUpperCase().indexOf(filter) > -1) {
            option.style.display = "";
        } else {
            option.style.display = "none";
        }
    }
}

/*

*/
//funcion mostrar la fecha actual
function fechainicio(){
var fechaInicio = document.getElementById('f_inicio').value;
  //alert(fechaInicio);
  var fechabloqueo = $("#f_inicio").val();
  var fechaMinima = new Date(fechabloqueo); // Crear un objeto Date con la fecha de bloqueo
  fechaMinima.setDate(fechaMinima.getDate() + 1); // Agregar un día
$("#f_fin").attr("min", fechaMinima.toISOString().split('T')[0]);
}
</script>
<? } ?>
    

