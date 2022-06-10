<?php
require('../libs/conex.php');
require('../libs/ciudades.lib.php');
$link=conectar();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ciudades</title>
      <!--libreria ionicons para agregar iconos a los botones-->
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!--BOOSTRAP POR MEDIO DE CDN-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <div>
    <?php
      //Importamos nuestra barra de navegacion 
      include("../libs/navbar.vw.php")
    ?>
  </div>
  <body>
    <?php
      //importamos el menu principal
      include('../libs/menu.php');
      //validamos que post o get no este vacios 
      if (!($_POST) && !($_GET))
      {
        include('list.php');
      }
      //esto es para manejar las acciones de acuerdo a los botones 
      //en caso que sea new nos dirigira a un formulario
      elseif ($_GET['mod']=="new")
      {
        include('form.php');
      }
      // en caso que sea edit nos dirigira al mismo formulario pero relleno para realizar los cambios deceados 
      elseif ($_GET['mod']=="edit"){
        //comprovamos que en el get viene el id que necesitamos 
        if ($_GET['id']){
          $res=mostrarCiudad($link,$_GET['id']);
          include('form.php');
        }
      }
      // en caso que el mod sea delete este eliminara un registro con el id del mismo 
      elseif ($_GET['mod']=="delete"){
          //tambien realizamos la comprobacion de que se encuentre el id del registro 
          if ($_GET['id']) {
            borrarCiudad($link,$_GET);
            include('list.php');
          }
      }elseif ($_POST) {
        //realizamos una comprovacion del valor del id para saber si es una insercion o una edicion 
        if ($_POST['id']==-1)
        {
          $salida= agregarCiudad($link,$_POST);
          include('list.php');
        } elseif ($_POST['id']!='') {
          $salida= editarCiudad($link,$_POST);
          include('list.php');
        }
      }
      ?>
  </body>
</html>