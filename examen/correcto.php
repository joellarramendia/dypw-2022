<?php
session_start();


if(isset($_POST['enviar'])){
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>DNI</th>";
    echo "<th>NOMBRE</th>";
    echo "<th>APELLIDO</th>";
    echo "<th>E-MAIL</th>";
    echo "<th>FENAC</th>";
    

    foreach($_SESSION['personas'] as $key => $value){
      ?>
      <tr>
        <td><?php echo $value['dni']; ?></td>;
        <td><?php echo $value['nombre']; ?></td>;
        <td><?php echo $value['apellido']; ?></td>;
        <td><?php echo $value['ecorreo']; ?></td>;
        <td><?php echo $value['fenac']; ?></td>;

      </tr>

      <?php
    }
    echo "</tr>";

    echo "</table>";

    
  }

  ?>
    <button type="sumbit" name="volver">Volver al formulario</button>

  <?php

if(isset($_POST['volver'])){
    session_destroy();
    header("localitation::index.php");
}





  ?>
