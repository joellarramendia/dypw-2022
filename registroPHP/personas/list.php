<?php
//capturamos todas los datos de las personas guardadas en la base de datos 
$res=mostrarTodos($link);
?>
<h3>Personas</h3><a href="index.php?mod=new" class="btn btn-success"><i class="ion-ios-personadd"></i>  Nuevo</a>
    <?php
     //recuperamos los datos y los almacenamos en un array asociado
    while ($data=mysqli_fetch_array($res)){
       //importamos el modulo encargado de mostrar los datos recuperados
      include 'card.vw.php';
    }
?>
