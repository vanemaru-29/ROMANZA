document.getElementById('buscar-banco').onchange = function() {
    /* Referencia al option seleccionado */
    
    var mOption = this.options[this.selectedIndex];
    /* Referencia a los atributos data de la opción seleccionada */
    var mData = mOption.dataset;
  
    /* Referencia a los input */
    var elId = document.getElementById('id');
    var descripcion = document.getElementById('descripcion');
    var nombre = document.getElementById('nombre');
    var eltitular = document.getElementById('titular');
  
  
    /* Asignamos cada dato a su input*/
  console.log(mData)
    descripcion.value = mData.text;
    nombre.value = mData.text; /*Se usará el valor que se muestra*/

  
  
  };