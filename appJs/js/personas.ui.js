//cuando se cancela la carga de datos en el formulario se retorna a mostrar los datos que ya se tiene 
document.getElementById("cancelFormPersonas").onclick = showListPersonas;

//cuando se preciona el boton envuar del formulario de personas se realiza la siguiente accion 
document.getElementById("btProcesar").onclick= validarFormPersonas;
document.getElementById("jsonPersonas").onclick= JSONPersonas;


window.onload=iniciarApp;


function limpiarPersonas() {
    document.getElementById("datosPersonas").innerHTML = "";
    console.log("liampiando datos de personas");
}

function mostrarPersonas() {
    console.log("cargando datos...");
    if (personas!=null) {
        salida="<h3>Personas</h3><a id='btNuevo' data-id='-1' class='btn btn-success ' >Nuevo</a> <a data-id=''  class='btn btn-primary btn-jsonPersona' target='new'>JSON</a>";
        for (let i = 0; i < personas.length; i++) {
            salida=salida+"<div class='card'><div class='card-header'>"+personas[i].id+"-"+personas[i].apellido+", "+personas[i].nombre+"</div><div class='card-body'><div class='row'><div class='col'><p class='card-text'><label>CI Nro.:</label>"+personas[i].cin+ "</p><p class=''><label>Fecha de Nacimiento:</label>" +personas[i].fenac+"</p><p class='card-text'><label>Localidad:</label>"+personas[i].ciudad_id+"</p></div><div class='col'><a data-id='"+personas[i].id+"'  class='btn btn-warning btn-editPersona'>Editar</a><a data-id="+personas[i].id+" ''  class='btn btn-danger btn-borrarPersona'>Borrar</a><a data-id="+personas[i].id+" ''  class='btn btn-primary btn-jsonPersona' target='new'>JSON</a></div></div></div></div>";
        }
        document.getElementById("datosPersonas").innerHTML=salida;
        //boton para editar, buscaremos el id del boton precionado
        btns = document.getElementsByClassName('btn-editPersona');
        for (let i = 0; i < btns.length; i++) {
            btns[i].onclick = editarPersona;
        }
        bbtn = document.getElementsByClassName('btn-borrarPersona');
        for (let i = 0; i < bbtn.length; i++) {
            bbtn[i].onclick = borrarPersona;
        }
        bbtj = document.getElementsByClassName('btn-jsonPersona');
        for (let i = 0; i < bbtj.length; i++) {
            bbtj[i].onclick = JSONPersonas;
        }
        document.getElementById("btNuevo").onclick = editarPersona;
        showListPersonas();
    }
}

function nuevoPersona() {
    limpiarPersonas();
    document.getElementById("cin").focus();
}

function limpiarFormPersona(){
    document.getElementById('idx').value="-1";
    document.getElementById('cin').value="";
    document.getElementById('apellido').value="";
    document.getElementById('nombre').value="";
    document.getElementById('fenac').value="";
}

function editarPersona(e){
    let idxe=getPersonasById(e.target.attributes["data-id"].value);
    console.log(idxe);
    if (idxe>=0) {
        document.getElementById('id').value=personas[idxe].id;
        document.getElementById('cin').value=personas[idxe].cin;
        document.getElementById('apellido').value=personas[idxe].apellido;
        document.getElementById('nombre').value=personas[idxe].nombre;
        document.getElementById('fenac').value=personas[idxe].fenac;
    } else {
        document.getElementById('id').value="-1";
        document.getElementById('cin').value="";
        document.getElementById('apellido').value="";
        document.getElementById('nombre').value="";
        document.getElementById('fenac').value="";
    }
    //document.getElementById('cin').focus();
    iniciarApp();
    showFormPersonas();
}
