<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?= $navegacion['tarea_principal'] ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url("routing/".TAREA_DASHBOARD)?>">Inicio</a></li>
            <li class="breadcrumb-item"><?= $navegacion['tarea_principal'] ?></li>
            <li class="breadcrumb-item active"><?= $navegacion['tarea_activa'] ?></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="content">

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('recursos_sistema/torneos/copa.jpg') ?>" alt="User profile picture">
          </div>
          <h3 class="profile-username text-center"><?=$datos_torneo->nombre_torneo?></h3>
          <p class="text-muted text-center"><?=$datos_torneo->categoria_torneo->nombre_categoria?></p>
          <p class="text-muted text-center"><?=$datos_torneo->comentarios_torneo?></p>
          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Goles anotado</b> <a class="float-right">1,322</a>
            </li>
            <li class="list-group-item">
              <b>Partidos</b> <a class="float-right">543</a>
            </li>
            <li class="list-group-item">
              <b>Torneos</b> <a class="float-right">13,287</a>
            </li>
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#equipos" data-toggle="tab">Equipos</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar</a></li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="equipos">
                <div class="row">
                  <section class="col-lg-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Datos jugador</h3>
                        </div>
                        <?= form_open(base_url("torneo_detalles/guardar_equipos"),array("class"=>"m-t","id"=>"formulario_registro")); ?>
                          <div class="card-body">
                              <?php if(isset($validation)) :?>
                                <?=  ' <div class="unstyle"><span class="text-danger  text-center">'.$validation->listErrors().'</span></div>'?>
                              <?php endif ?>
                              <h4>Equipos</h4>
                              <hr>
                              <fieldset>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                          <label>Multiple</label>
                                          <select class="select2bs4" multiple="multiple" name= "id_equipos[]" data-placeholder="Selecciona un equipo"
                                                  style="width: 100%;">
                                            <?php
                                            if ($equipos_disponibles != null) {
                                                foreach ($equipos_disponibles as $equipo) {
                                                    echo '<option value='.$equipo->id_equipo.'>'.$equipo->nombre_equipo.'</option>';
                                                }
                                            }
                                             ?>
                                            <
                                          </select>
                                        </div>
                                     </div>
                                </div>
                            </fieldset>

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary  float-right">Guardar</button>
                          </div>
                          <?= form_close(); ?>
                      </div>
                  </section>
                </div>
                <div class="row">
                    <div class="card-body">
                      <table id="tabla_equipos" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Imagen</th>
                          <th>Nombre</th>
                          <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($equipos_en_torneo != NULL) {
                                foreach ($equipos_en_torneo as $equipo) {
                                    echo '
                                    <tr>
                                      <td>'.$equipo->id_equipo.'</td>
                                      <td class ="text-center"><img src="'.base_url('recursos_sistema/logos_equipos/'.$equipo->logo_equipo).'"class="direct-chat-img" alt="User Image" </td>
                                      <td>'.$equipo->nombre_equipo.'</td>
                                      <td class="text-center">
                                          <div class="btn-group">
                                            <a href="'.base_url('routing/'.TAREA_EQUIPO_DETALLES).'/'.$equipo->id_equipo.'"  class="btn btn-primary">Ver</a>
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                              <a class="dropdown-item" href="#" onclick=eliminar_equipo('.$equipo->id_equipo.')>Eliminar</a>
                                            </div>
                                          </div>
                                      </td>
                                    </tr>
                                    ';
                                }
                            }
                             ?>
                        </tfoot>
                      </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="settings">
                <div class="row">
                  <section class="col-lg-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Datos jugador</h3>
                        </div>
                        <?= form_open(base_url("torneo_detalles/editar_torneo"),array("class"=>"m-t","id"=>"formulario_registro")); ?>
                          <div class="card-body">
                              <?php if(isset($validation)) :?>
                                <?=  ' <div class="unstyle"><span class="text-danger  text-center">'.$validation->listErrors().'</span></div>'?>
                              <?php endif ?>
                              <h4>Datos personales</h4>
                              <hr>
                              <fieldset>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                      <div class="form-group">
                                        <label for="name">Nombre torneo</label>
                                        <?= form_input(array("class"=>"form-control" , "id"=>"nombre_torneo", "type"=>"text","name"=>"nombre_torneo","placeholder"=>"Nombre torneo", "value"=>$datos_torneo->nombre_torneo)); ?>
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                          <label>Categoría de juego</label>
                                          <select class="form-control select2bs4" name= "id_categoria_equipo" style="width: 100%;">
                                              <option value="<?= $datos_torneo->categoria_torneo->id_categoria_equipo ?>"><?= $datos_torneo->categoria_torneo->nombre_categoria ?></option>

                                              <?php
                                                  foreach ($categorias_equipos as $id =>$categoria) {
                                                      echo '<option value='.$categoria->id_categoria_equipo.'>'.$categoria->nombre_categoria .'</option>';
                                                  }
                                               ?>
                                          </select>
                                        </div>
                                     </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-12 col-lg-12">
                                      <label for="name">Fecha torneo</label>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" name="fecha_torneo" class="form-control float-right" id="reservationtime">
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Descripción </label>
                                        <?= form_textarea(array("class"=>"form-control", "rows"=>"3", "id"=>"descripcion", "name"=>"descripcion","placeholder"=>"Descripción", "value"=>$datos_torneo->comentarios_torneo)); ?>
                                      </div>
                                  </div>
                                </div>
                            </fieldset>

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary  float-right">Guardar</button>
                          </div>
                          <?= form_close(); ?>
                      </div>
                  </section>
                </div>
            </div>
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<script>
  $(function () {
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'YYYY-MM-DD hh:mm A'
        }
      })
      $('.select2').select2()
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      $("#tabla_equipos").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabla_equipos .col-md-6:eq(0)');
  });

  function eliminar_equipo(id_equipo){
    Swal.fire({
       title: '¿Estás seguro de eliminar este equipo?',
       text: "No podrás recuperar esta información",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       cancelButtonText: 'No',
       confirmButtonText: 'Si',
     }).then((result) => {
       if (result.isConfirmed) {
           $.ajax({
               type: "POST",
               url: "torneo_detalles/eliminar_equipo_torneo",
               data: {"id_equipo": id_equipo},
               success: function(result) {
                   Swal.fire(
                     'Eliminado!',
                     'Acción realizada con exito',
                     'success'
                   )
                   setTimeout("location.reload()", 3000);
               },
               error: function(error){
                   Swal.fire(
                     'Error!',
                     'No pudimos realizar la acción',
                     'error'
                   )
               }
           });
       }
     })
  }
</script>
