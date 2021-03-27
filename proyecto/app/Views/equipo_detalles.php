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
              <img class="profile-user-img img-fluid img-circle"
                   src="<?= base_url('recursos_sistema/logos_equipos/'.$datos_equipo->logo_equipo.'') ?>"
                   alt="User profile picture">
          </div>
          <h3 class="profile-username text-center"><?=$datos_equipo->nombre_equipo?></h3>
          <p class="text-muted text-center"><?=$datos_equipo->categoria_equipo->nombre_categoria?></p>
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
            <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Jugadores</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar</a></li>
            <li class="nav-item"><a class="nav-link" href="#imagen" data-toggle="tab">Logo</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="timeline">
                <div class="row">
                    <div class="card-body">
                      <table id="jugadores" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Numero</th>
                          <th>Posicion</th>
                          <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($jugadores != NULL) {
                                foreach ($jugadores as $jugador) {
                                    echo '
                                    <tr>
                                      <td>'.$jugador->id_jugador.'</td>
                                      <td>'.$jugador->nombre_jugador.'</td>
                                      <td>'.$jugador->numero.'</td>
                                      <td>'.$jugador->posicion.'</td>
                                      <td class="text-center">
                                          <div class="btn-group">
                                            <a href="'.base_url('routing/'.TAREA_JUGADOR_DETALLES).'/'.$jugador->id_jugador.'"  class="btn btn-primary">Ver</a>
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                              <a class="dropdown-item" href="#" onclick=eliminar_jugador('.$jugador->id_jugador.')>Eliminar</a>
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
                        <?= form_open(base_url("equipo_detalles/editar_equipo"),array("class"=>"m-t","id"=>"formulario_registro")); ?>
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
                                        <?= form_input(array("class"=>"form-control" , "id"=>"nombre_equipo", "type"=>"text","name"=>"nombre_equipo","placeholder"=>"Nombre equipo", "value"=>$datos_equipo->nombre_equipo)); ?>

                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                          <label>Categoría de juego</label>
                                          <select class="form-control select2bs4" name= "id_categoria_equipo" style="width: 100%;">
                                              <option value="<?= $datos_equipo->categoria_equipo->id_categoria_equipo ?>"><?= $datos_equipo->categoria_equipo->nombre_categoria ?></option>

                                              <?php
                                                  foreach ($categorias_equipos as $id =>$categoria) {
                                                      echo '<option value='.$categoria->id_categoria_equipo.'>'.$categoria->nombre_categoria .'</option>';
                                                  }
                                               ?>
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
            </div>
            <div class="tab-pane" id="imagen">
                <div class="row">
                  <section class="col-lg-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Quick Example</h3>
                        </div>
                        <?= form_open_multipart(base_url("equipo_detalles/actualizar_imagen_equipo"),array("class"=>"m-t","id"=>"formulario_registro")); ?>
                          <div class="card-body">
                              <?php if(isset($validation)) :?>
                                <?=  ' <div class="unstyle"><span class="text-danger  text-center">'.$validation->listErrors().'</span></div>'?>
                              <?php endif ?>
                              <h4>Imagen</h4>
                              <hr>
                              <fieldset>
                                <div class="form-group">
                                  <label for="exampleInputFile">Imagen equipo</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" name="imagen_equipo" class="custom-file-input" id="imagen_equipo">
                                      <label class="custom-file-label" for="foto_jugador">Elige una imagen</label>
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
        </div>
      </div>
    </div>
  </div>
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
      $("#jugadores").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#jugadores .col-md-6:eq(0)');


  });


</script>
