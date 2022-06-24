function getCiudades() {
    console.log("cargando datos de ciudades...");
    url = rutaJSON+"ciudades/json.php";
    $.getJSON(url,function (data) {
        localStorage.setItem('ciudades', JSON.stringify(data));
    });
    ciudades=JSON.parse(localStorage.getItem('ciudades'));
    if (ciudades == null) {
        ciudades = [];
    }
}

function getCiudadById(cid) {
    for (let i = 0; i < ciudades.length; i++) {
        if (ciudades[i].id == cid){
            return i;
        }
    }
    return -1;
}

function guardarCiudad() {
    let datos = {
        "id": document.getElementById("idx").value,
        "ciudad": document.getElementById("ciudad").value
    }
    console.log("guardando Ciudad...");
    url = rutaJSON+"ciudades/api.php";
    console.log(url);
    $.post(url,datos);
    limpiarFormCiudad();
    iniciarApp();
    showListCiudades();
}

function editarCiudad(e) {
    console.log("editando una ciudad...");
    let idxe = e.target.attributes["data-id"].value;
    idx = getCiudadById(idxe);
    console.log(idx);
    if(idx>=0){
        document.getElementById("idx").value = ciudades[idx].id;
        document.getElementById("ciudad").value = ciudades[idx].ciudad;
    }else{
        document.getElementById("idx").value = -1;
        document.getElementById("ciudad").value ="";
    }
    showFormCiudades();
    document.getElementById("ciudad").focus();
}

function borrarCiudad(e) {
    let idxe = e.target.attributes["data-id"].value;
    url = rutaJSON+"ciudades/api.php?mod=delete&id="+idxe;
    console.log(url);
    $.get(url);
    iniciarApp();
    showListCiudades();
}

function validarFormCiudades() {
    console.log("validando.....");
    let ciudad = document.getElementById('ciudad').value;
    if (ciudad.length != 0) {
        console.log("Entro en el if de la validacion")
        guardarCiudad();
    } else {
        alert("No puedes dejar campos vacios");
    }
}

function JSONCiudades(e) {
    let idxe = e.target.attributes["data-id"].value;
    let url = rutaJSON+"ciudades/json.php?id="+idxe;
    console.log(url);
    window.open(url,"_blank");
    $.get(url);
}