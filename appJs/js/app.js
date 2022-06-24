//Botones de Navegacion
document.getElementById('personasList').onclick=showListPersonas;
document.getElementById('ciudadesList').onclick=showListCiudades; // asigno la funcion limpiarTabla al evento click del boton


personas = [];
ciudades = [];
rutaJSON = "http://127.0.0.1/repositorios/dypw-2022-1/0602cards/";

///Realizamos todas las funciones para mostrar o esconder div en el documento

//Mostrar Formualario De Ciudades
function showFormCiudades() {
    console.log("Mostrando Formulario de Ciudades")
    $("#datosCiudades").hide();
    $("#datosPersonas").hide();
    $("#formPersonas").hide();
    $("#formCiudades").show();
}

//Mostrar Formualario De Personas
function showFormPersonas() {
    console.log("Mostrando Formulario de Personas")
    $("#datosCiudades").hide();
    $("#datosPersonas").hide();
    $("#formPersonas").show();
    $("#formCiudades").hide();
}

//Mostrar Datos De Ciudades
function showListCiudades() {
    console.log("Mostrando Datos de Ciudades")
    $("#datosCiudades").show();
    $("#datosPersonas").hide();
    $("#formPersonas").hide();
    $("#formCiudades").hide();
}

//Mostrar Datos De Personas
function showListPersonas() {
    console.log("Mostrando Datos de Personas")
    $("#datosCiudades").hide();
    $("#datosPersonas").show();
    $("#formPersonas").hide();
    $("#formCiudades").hide();
}

function iniciarApp() {
    cargarPersonas();
    mostrarPersonas();
    getCiudades();
    mostrarCiudades();
}
