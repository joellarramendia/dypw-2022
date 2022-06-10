<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
   session_start();

   if(isset($_POST['personas'])){
     $_SESSION['personas']=array();
   }

   if(isset($_POST['enviar'])){

    
     $dni=$_POST['dni'];
     $nombre=$_POST['nombre'];
     $apellido=$_POST['apellido'];
     $ecorreo=$_POST['ecorreo'];
     $fenac=$_POST['fenac'];

     if(empty($dni) || empty($nombre) || empty($apellido) || empty($ecorreo) || empty($fenac)){
       echo "Rellena todos los valores";
     }else{

     $persona=array(
         "dni"=>$dni,
       "nombre"=>$nombre,
       "apellido"=>$apellido,
       "ecorreo"=>$ecorreo,
       "fenac"=>$fenac,
     );

     if(isset($_SESSION['personas'][$dni])){
       echo "Se ha modificado el alumno con numero de cedula ".$dni;

     }else{
       echo "Se ha cargado una nueva persona";

     }
     

     if(isset($_REQUEST['limpiar'])){
         session_destroy();
         header("localitation::index.php");
     }
     

     $_SESSION['personas'][$dni]=$persona;

     //echo '<pre>';
    // print_r($_SESSION);
   }

   }
?>

<body>
    <form action="correcto.php" method="post">

         <label for="dni">DNI</label>
        <input type="text" id="dni" name="dni" value="" requerid />
        <br /><br />

        <label for="dni">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="" requerid />
        <br /><br />

        <label for="nombre">Apellido</label>
        <input type="text" id="apellido" name="apellido" value="" requerid  />
        <br /><br />

        <label for="apellido">E-mail</label>
        <input type="text" id="ecorreo" name="ecorreo" value="" requerid />
        <br /><br />

        <label for="fenac">F. Nacimiento</label>
        <input type="text" id="fenac" name="fenac" value ="" requerid/>
        <br /><br />

        <button type="sumbit" name="enviar">Enviar</button>
        <button type="sumbit" name="limpiar">Limpiar</button><br/>
    </form>

    

?>
</body>
</html>