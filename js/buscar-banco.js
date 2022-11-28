document.getElementById('buscar-banco').onchange = function() {
    /* Referencia al option seleccionado */
    
    var mOption = this.options[this.selectedIndex];
    /* Referencia a los atributos data de la opción seleccionada */
    var mData = mOption.dataset;
  
    /* Referencia a los input */
    var elId = document.getElementById('id');
    var elcedula = document.getElementById('cedula');
    var eltelefono = document.getElementById('telefono');
    var eltitular = document.getElementById('titular');
  
  
    /* Asignamos cada dato a su input*/
    elId.value = this.value;
    elcedula.value = mData.dni;
    eltelefono.value = mOption.text; /*Se usará el valor que se muestra*/
    eltitular.value = mData.text;
  
  
  };