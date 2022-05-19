<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
    session_start();

    if(isset($_POST['personas'])){
      $_SESSION['personas']=array();
    }

    if(isset($_POST['enviar'])){
      $dni=$_POST['dni'];
      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $fenac=$_POST['fenac'];

      if(empty($dni) || empty($nombre) || empty($apellido) || empty($fenac)){
        echo "Rellena todos los valores";
      }else{

      $persona=array(
        "dni"=>$dni,
        "nombre"=>$nombre,
        "apellido"=>$apellido,
        "fenac"=>$fenac,
      );

      if(isset($_SESSION['personas'][$dni])){
        echo "Se ha modificado el alumno con numero de cedula ".$dni;

      }else{
        echo "Se ha cargado una nueva persona";

      }
      

      if(isset($_REQUEST['elimuar'])){
          session_destroy();
          header(localitation::formulario.php);
      }
      

      $_SESSION['personas'][$dni]=$persona;

      //echo '<pre>';
     // print_r($_SESSION);
    }

    }

  ?>
  <form action="" method="post">

    <label for="dni">DNI</label>
    <input type="text" id="dni" name="dni"  />
    <br /><br />

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre"  />
    <br /><br />

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" />
    <br /><br />

    <label for="fenac">Fenac</label>
    <input type="text" id="fenac" name="fenac" />
    <br /><br />

    <button type="sumbit" name="enviar">Enviar</button>
    <button type="sumbit" name="mostrar">Mostrar</button><br/>
    <button type="sumbit" name="eliminar">Eliminar</button><br/>

    <?php

    if(count($_SESSION['personas'])===0){
      echo "<p>No hay alumnos</p>";
    }else{

    

      if(isset($_POST['mostrar'])){
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>DNI</th>";
        echo "<th>NOMBRE</th>";
        echo "<th>APELLIDO</th>";
        echo "<th>FENAC</th>";

        foreach($_SESSION['personas'] as $key => $value){
          ?>
          <tr>
            <td><?php echo $value['dni']; ?></td>;
            <td><?php echo $value['nombre']; ?></td>;
            <td><?php echo $value['apellido']; ?></td>;
            <td><?php echo $value['fenac']; ?></td>;

          </tr>

          <?php
        }
        echo "</tr>";

        echo "</table>";
      }
    }   


    ?>
  </form>

  
</body>
</html>