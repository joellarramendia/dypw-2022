<!--ESTE ES UN TEMPLETE PARA GENERAR CARDS DE MANERA DINAMICA CON LOS VALORES OBTENIDOS DE LA BASE DE DATOS-->

<div class="card">
  <div class="card-header">
    <!--ACCEDEMOS AL VALOR MEDIANTE EL NOMBRE DE LAS COLUMNAS--> 
    <?php echo $data['apellido'].", ".$data['nombre']; ?>
  </div>
  <div class="card-body">
    <div class="row">
    <div class="col">
      <p class="card-text">CI Nro.:<?php echo $data['cin']; ?> </p>
      <p class="">F. de Nacimiento: <?php echo $data['fenac'] ?></p>
      <p>Edad:  <a class="btn btn-primary"><span class="badge badge-pill badge-success"> <?php echo edadPersona($data['fenac']); ?></span></a> </p>
      <p class="card-text">Localidad: <?php nombreCiudad($link,$data['ciudad_id']); ?> </p>
    </div>
    <div class="col">
      <a href="<?php echo "index.php?mod=edit&id=".$data["id"]; ?>" class="btn btn-warning "> <i class="ion-edit"></i> Editar</a>
      <a href="<?php echo "index.php?mod=delete&id=".$data["id"]; ?>" class="btn btn-danger"> <i class="ion-android-delete"></i> Borrar</a>
    </div>
    </div>
  </div>
</div>
