<?php
require('../libs/conex.php');
require('../libs/ciudades.lib.php');
require('../libs/personas.lib.php');
$link=conectar();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Personas</title>
        <!--libreria de boostrap por medio del cdn-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!--libreria ionicons para agregar iconos a los botones-->
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<div>
    <?php
        include("../libs/navbar.vw.php")
    ?>
    </div>
    <body>
        <?php
            include('../libs/menu.php');
        ?>
    <div class="container">


    <?php
        if (!($_POST) && !($_GET)){
            include('list.php');
        }
        elseif ($_GET['mod']=="new"){
            $ciudades=mostrarCiudades($link);
            include('form.php');
        }
        elseif ($_GET['mod']=="edit"){
            if ($_GET['id']){
                $ciudades=mostrarCiudades($link);
                $res=mostrarPorId($link,$_GET['id']);
                include('form.php');
            }
        }
        elseif ($_GET['mod']=="delete"){
            if ($_GET['id']) {
                borrarPersona($link,$_GET);
                include('list.php');
            }
        }elseif ($_POST) {
            if ($_POST['id']==-1){
                $salida= agregarPersona($link,$_POST);
                include('list.php');
            } elseif ($_POST['id']!='') {
                $salida= editarPersona($link,$_POST);
                include('list.php');
            }
        }
        ?>
        </div>
        <script type="text/javascript" src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>
    </body>
</html>
