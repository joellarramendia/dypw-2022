//cargamos los datos de prueba al array persona por medio del local storage
function cargarPersonas() {
    console.log("cargando datos a Personas...");
    url=rutaJSON+"personas/json.php";
    $.getJSON(url,function (data) {
        localStorage.setItem('personas', JSON.stringify(data));
    });
    personas = JSON.parse(localStorage.getItem('personas'));
    if(personas == null){
        personas = [];
    }
}

//buscamos las personas por su id en caso que haya coinsidencia retornara el numero de id en caso contrario retornara -1
function getPersonasById(pid) {
    for (let i = 0; i < personas.length; i++) {
        if(personas[i].id == pid){
            return i;
        }
    }
    return -1;
}

//Funcion para Borrar Registros de Personas
function borrarPersona(e) {
    let idxe = e.target.attributes["data-id"].value;
    let url = rutaJSON+"personas/api.php?mod=delete&id="+idxe;
    console.log(url);
    $.get(url);
    mostrarPersonas();
}

function guardarPesona() {
    let datos ={
        "id":document.getElementById("id").value,
        "cin":document.getElementById('cin').value,
		"apellido":document.getElementById('apellido').value,
		"nombre": document.getElementById('nombre').value,
		"fenac":document.getElementById('fenac').value
    }
    let url = rutaJSON+"personas/api.php";
    $.post(url,datos);
    limpiarFormPersona();
    iniciarApp();
    showListPersonas();
}

function validarFormPersonas() {
    console.log("validando.....");
    let cin = document.getElementById('cin').value;
    let apellido = document.getElementById('apellido').value;
    let nombre= document.getElementById('nombre').value;
    let fenac = document.getElementById('fenac').value;
    if (cin.length != 0 || apellido.length != 0 || nombre != 0 || fenac != 0) {
        console.log("Entro en el if de la validacion")
        guardarPesona();
    } else {
        alert("No puedes dejar campos vacios");
    }
}

function JSONPersonas(e) {
    let idxe = e.target.attributes["data-id"].value;
    let url = rutaJSON+"personas/json.php?id="+idxe;
    console.log(url);
    window.open(url);
    $.get(url);
}