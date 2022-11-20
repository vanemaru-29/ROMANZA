function buscarCat() {
    var num_cols, display, campo, files, tabla_body, tr, td, i, txtValue;
    num_cols = 1;
    campo = document.getElementById("buscar-cat");
    filtro = campo.value.toUpperCase();
    tabla_body = document.getElementById("the_tabla_body");
    tr = tabla_body.getElementsByTagName("tr");

    for(i=0; i< tr.length; i++){				
        display = "none";
        for(j=0; j < num_cols; j++){
            td = tr[i].getElementsByTagName("td")[j];
            if(td){
                txtValue = td.textContent || td.innerText;
                if(txtValue.toUpperCase().indexOf(filtro) > -1){
                    display = "";
                }
            }
        }
        tr[i].style.display = display;
    }
}

function buscarPdt(){
    var num_cols, display, campo, filtro, tabla_body, tr, td, i, txtValue;
    num_cols = 1;
    campo = document.getElementById("buscar-pdt");
    filtro = campo.value.toUpperCase();
    tabla_body = document.getElementById("the_tabla_body");
    tr = tabla_body.getElementsByTagName("tr");

    for(i=0; i< tr.length; i++){				
        display = "none";
        for(j=0; j < num_cols; j++){
            td = tr[i].getElementsByTagName("td")[j];
            if(td){
                txtValue = td.textContent || td.innerText;
                if(txtValue.toUpperCase().indexOf(filtro) > -1){
                    display = "";
                }
            }
        }
        tr[i].style.display = display;
    }
}