<?php

//Datos de coneccion 
function conectar() {
  $server="127.0.0.1";     //127.0.0.1
  $usuario="root";
  $pass="";
  $bdatos="database";
  $enlace = mysqli_connect($server, $usuario, $pass, $bdatos);

  if (!$enlace) {
      echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
      echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
      echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
      exit;
  } else {
    return $enlace;
  }

}
//para detener la coneccion con la base de datos 
function desconectar($enlace){
  mysqli_close($enlace);
}
//desactivasmos warnings y notice
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING );
?>
