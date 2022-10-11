<center>
<div class="row">
  <div class="col-md-7 col-md-offset-2">
    <h1>Actualizar datos</h1>
    <form method="POST" action="<?php echo base_url('usuario/update')?>">
      <?php foreach ($datosUsuario as $value) { ?>
      <div class="form-group">
        <label for="exampleInputEmail1">Cedula de Identidad</label>
        <input type="text" name="txtci" class="form-control" id="exampleInputEmail1" value="<?php echo $value->ci; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nombre Completo</label>
        <input type="text" name="txtNombre" class="form-control" id="exampleInputEmail1" value="<?php echo $value->nom_com;?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Fecha de Nacimiento</label>
        <input type="text" name="txtFecha" class="form-control" id="exampleInputEmail1" value="<?php echo $value->fec_nac;?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Departamento</label>
        <input type="text" name="txtdpto" class="form-control" id="exampleInputPassword1" value="<?php echo $value->departamento;?>">
      </div>  
      <?php } ?>
      <button type="submit" class="btn btn-default">ACTUALIZAR DATOS</button>
    </form>
  </div>
</div>
</center>
        

