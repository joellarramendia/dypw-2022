<!--Templete html para agregar card de manera dinamica con nuevos datos de ciudades-->
<div class="container">
  <div class="card">
    <div class="card-header">
      <!--estamos imprimeindo el valor que trae nuestro array asociado data-->
      <?php echo $data['id']."- ".$data['ciudades']; ?>
    </div>
    <div class="card-body">
        <a href="<?php echo "index.php?mod=edit&id=".$data["id"]; ?>" class="btn btn-warning"> <i class="ion-edit"></i> Editar</a>
        <a href="<?php echo "index.php?mod=delecte&id=".$data["id"]; ?>" class="btn btn-danger"> <i class="ion-android-delete"></i> Borrar</a>
      </div>
      </div>
    </div>
  </div>
</div>
