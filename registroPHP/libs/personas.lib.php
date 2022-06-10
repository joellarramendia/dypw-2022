<?php
function mostrarTodos($link) {
  $sql="SELECT * FROM personas order by id ";
  $resultado = mysqli_query($link, $sql);
  if ($resultado) {
    return $resultado;
  }
}
function mostrarPorId($link,$id){
  $sql="SELECT * FROM personas WHERE id=".$id;
  $resultado = mysqli_query($link, $sql);
  if ($resultado) {
    return $resultado;
  }


}
function agregarPersona($link,$datos){
  $sql='INSERT INTO personas(id,cin,nombre,apellido,fenac,email,ciudad_id) VALUES (NULL,"'.$datos['cin'].'","'.$datos['nombre'].'","'.$datos['apellido'].'","'.$datos['fenac'].'","'.$datos['email'].'",'.$datos['ciudad_id'].')';
  $resultado = mysqli_query($link, $sql);
  if ($resultado) { return 1; } else { return 0; }

}
function editarPersona($link,$datos){
  $sql='update personas set cin= "'.$datos['cin'].'",nombre="'.$datos['nombre'].'",apellido="'.$datos['apellido'].'",fenac="'.$datos['fenac'].'", email="'.$datos['email'].'",ciudad_id='.$datos['ciudad_id'].' WHERE id='.$datos['id'].'';
  $resultado = mysqli_query($link, $sql);
}
function borrarPersona($link,$datos ){
  $sql="delete from personas where id=".$datos['id'];
  $resultado = mysqli_query($link, $sql);
  if ($resultado) { return 1; } else { return 0; }
}
function edadPersona($fenac){
  $date1 = new DateTime($fenac);
  $date2 = new DateTime();
  $diff = $date1->diff($date2);
  return $diff->y;
}
?>