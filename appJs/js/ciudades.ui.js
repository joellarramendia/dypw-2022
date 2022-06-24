document.getElementById("cancelFormCiudad").onclick = showListCiudades;
document.getElementById("enviarFormCiudad").onclick = validarFormCiudades;

window.onload=iniciarApp;


function mostrarCiudades() {
    console.log("listando ciudades...");
    if(ciudades != null){
        salida='<h3>Ciudades <span><a  class="btn btn-success btn-editcid" class="" data-id="-1" >Nuevo</a></span> <a data-id=""  class="btn btn-primary btn-jsonCiudades" target="new">JSON</a></h3>';
    for (let i = 0; i < ciudades.length; i++) {
        salida=salida+"<div class='card'><div class='card-header'>"+ciudades[i].id+"</div><div class='card-body'><div class='row'><div class='col'><p class='card-text'><label>Ciudad:</label>"+ciudades[i].ciudad+"</p></div><div class='col'><a data-id='"+ciudades[i].id+"' class='btn btn-warning btn-editcid'>Editar</a><a data-id='"+ciudades[i].id+"' class='btn btn-danger btn-delcid'>Borrar</a><a data-id="+ciudades[i].id+" ''  class='btn btn-primary btn-jsonCiudades' target='new'>JSON</a></div></div></div></div>";
    }
    document.getElementById('datosCiudades').innerHTML = salida;
    let btns = document.getElementsByClassName('btn-editcid');
    for (let i = 0; i < btns.length; i++) {
        btns[i].onclick = editarCiudad;
    }
    let bbtn = document.getElementsByClassName('btn-delcid');
    for (let i = 0; i < bbtn.length; i++) {
        bbtn[i].onclick = borrarCiudad;
    }
    bbtj = document.getElementsByClassName('btn-jsonCiudades');
        for (let i = 0; i < bbtj.length; i++) {
            bbtj[i].onclick = JSONCiudades;
        }
    showListCiudades();
    }
}


function nuevaCiudad() {
    limpiarFormCiudad();
    document.getElementById('ciudad').focus();
}

function limpiarFormCiudad() {
    document.getElementById("idx").value = "-1";
    document.getElementById("ciudad").value = "";
}



