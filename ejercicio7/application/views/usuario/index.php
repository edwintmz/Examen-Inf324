<!--Aquí estará el Crud de Usuario-->
<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">&nbsp;&nbsp;CONSULTA&nbsp;&nbsp;</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">&nbsp;&nbsp;REGISTRO&nbsp;&nbsp;</a></li>    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
      <h1>LISTA DE PERSONAS</h1>
      <table class="table table-hover">
        <thead>
          <th>CI</th>
          <th>Nombres</th>
          <th>Fec. Nacimiento</th>
          <th>Departamento</th>
          <th><center>Acciones</center></th>
        </thead>
              
        <tbody>
          <?php foreach ($listaUsuario as $value) { ?>
          <tr>
            <td><?php echo $value->ci; ?></td>
            <td><?php echo $value->nom_com; ?></td>
            <td><?php echo $value->fec_nac; ?></td>
            <td><?php echo $value->departamento; ?></td>
            <td> 
              <center>
                <a href="<?php echo base_url('usuario/delete')."/".$value->ci; ?>" title="Eliminar registro">Eliminar</a>
                <a href="<?php echo base_url('usuario/edit')."/".$value->ci; ?>" title="Editar registro">Editar</a>
              </center>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
      <div class="row">
        <div class="col-md-7">
          <h1>REGISTRO DE PERSONA</h1>
          <form method="POST" action="<?php echo base_url('usuario/insert')?>">
            <div class="form-group">
              <label for="exampleInputEmail1">Cedula de Identidad</label>
              <input type="text" name="txtci" class="form-control" id="exampleInputEmail1" placeholder="Cedula de Identidad">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nombre Completo</label>
              <input type="text" name="txtNombre" class="form-control" id="exampleInputEmail1" placeholder="Nombre completo">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Fecha de Nacimiento</label>
              <input type="text" name="txtFecha" class="form-control" id="exampleInputEmail1" placeholder="aaaa-mm-dd">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Departamento</label>
              <input type="text" name="txtdpto" class="form-control" id="exampleInputPassword1" placeholder="telefono">
            </div>  
            <button type="submit" class="btn btn-default">REGISTRAR DATOS</button>
          </form>
        </div>
        <div class="col-md-5">
      </div>
    </div>
  </div>
</div>
</div>
