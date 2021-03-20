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
                 src="<?= base_url('recursos_sistema/fotos_jugadores/'.$datos_jugador->foto_jugador.'') ?>"
                 alt="User profile picture">
          </div>
          <h3 class="profile-username text-center"><?=$datos_jugador->nombre_completo?></h3>
          <p class="text-muted text-center"><?=$datos_jugador->posicion?></p>
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

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Acerca de</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <strong><i class="fas fa-shield-alt mr-1"></i> Equipo actual</strong>

            <p class="text-muted"><?=$equipo->nombre_equipo ?></p>

            <hr>

          <strong><i class="fas fa-ruler-vertical mr-1"></i>Estatura</strong>

          <p class="text-muted"><?=$datos_jugador->estatura?> cm</p>

          <strong><i class="fas fa-venus-mars mr-1"></i>Sexo</strong>

          <p class="text-muted"><?=$datos_jugador->sexo_texto?></p>


          <strong><i class="fas fa-sort-numeric-up-alt mr-1"></i> Número</strong>

          <p class="text-muted"><?=$datos_jugador->numero?></p>

          <hr>

          <strong><i class="fas fa-birthday-cake mr-1"></i> Fecha nacimiento</strong>

          <p class="text-muted"><?=$datos_jugador->fecha_nacimiento?></p>
          <hr>
          <strong><i class="fas fa-calendar-check mr-1"></i> Edad</strong>

          <p class="text-muted"><?=$datos_jugador->edad?> años</p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Actividad</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar</a></li>
            <li class="nav-item"><a class="nav-link" href="#imagen" data-toggle="tab">Imagen</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <!-- /.tab-pane -->
            <div class="active tab-pane" id="timeline">
              <!-- The timeline -->
              <div class="timeline timeline-inverse">
                  <div class="time-label">
                    <span class="bg-danger">
                      SIN DATOS
                    </span>
                  </div>
                  <div>
                    <i class="fas fa-times bg-danger"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-times"></i></span>

                      <h3 class="timeline-header border-0"><a href="#"></a>No hay actividad para este jugador
                      </h3>
                    </div>
                  </div>

                <!-- <div class="time-label">
                  <span class="bg-info">
                    10 Feb. 2014
                  </span>
                </div>
                <div>
                  <i class="fas fa-check bg-success"></i>
                  <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i></span>

                    <h3 class="timeline-header border-0"><a href="#">Anotacion</a> Realizó una notación
                    </h3>
                  </div>
                </div>
                <div>
                  <i class="fas fa-info bg-warning"></i>
                  <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i></span>

                    <h3 class="timeline-header border-0"><a href="#">Recibió tarjeta</a> Recibió una tarjeta  tipo tarjeta
                    </h3>
                  </div>
                </div>
                <div>
                  <i class="fas fa-list bg-info"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i></span>

                    <h3 class="timeline-header border-0"><a href="#">En partido</a> Registro en partido
                    </h3>
                  </div>
                </div>

                <div class="time-label">
                  <span class="bg-info">
                    10 Feb. 2014
                  </span>
                </div>
                <div>
                  <i class="fas fa-check bg-success"></i>
                  <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i></span>

                    <h3 class="timeline-header border-0"><a href="#">Anotacion</a> Realizó una notación
                    </h3>
                  </div>
                </div>
                <div>
                  <i class="fas fa-info bg-danger"></i>
                  <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i></span>

                    <h3 class="timeline-header border-0"><a href="#">Recibió tarjeta</a> Recibió una tarjeta  tipo tarjeta
                    </h3>
                  </div>
                </div>
                <div>
                  <i class="fas fa-list bg-info"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i></span>

                    <h3 class="timeline-header border-0"><a href="#">En partido</a> Registro en partido
                    </h3>
                  </div>
                </div>

                <div>
                  <i class="far fa-clock bg-gray"></i>
                </div> -->
              </div>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
                <div class="row">
                  <section class="col-lg-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Datos jugador</h3>
                        </div>
                        <?= form_open_multipart(base_url("jugador_detalles/editar_jugador"),array("class"=>"m-t","id"=>"formulario_registro")); ?>
                          <div class="card-body">
                              <?php if(isset($validation)) :?>
                                <?=  ' <div class="unstyle"><span class="text-danger  text-center">'.$validation->listErrors().'</span></div>'?>
                              <?php endif ?>
                              <h4>Datos personales</h4>
                              <hr>
                              <fieldset>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <?= form_input(array("class"=>"form-control" , "id"=>"nombre", "type"=>"text","name"=>"nombre","placeholder"=>"Nombre", "value"=>$datos_jugador->nombre)); ?>
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="apellido_paterno">Paterno</label>
                                        <?= form_input(array("class"=>"form-control" , "id"=>"apellido_paterno", "type"=>"text","name"=>"apellido_paterno","placeholder"=>"Apellido paterno", "value"=> $datos_jugador->apellido_paterno)); ?>
                                      </div>
                                  </div>
                                  <div class="col-sm-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="apellido_materno">Materno</label>
                                        <?= form_input(array("class"=>"form-control" , "id"=>"apellido_materno", "type"=>"text","name"=>"apellido_materno","placeholder"=>"Apellido materno", "value"=>$datos_jugador->apellido_materno)); ?>
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                      <div class="form-group">
                                        <label for="edad">Edad</label>
                                        <?= form_input(array("class"=>"form-control" , "id"=>"edad", "type"=>"number","name"=>"edad","placeholder"=>"Edad","value"=>$datos_jugador->edad)); ?>
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                      <div class="form-group">
                                        <label for="estatura">Estatura</label>
                                        <?= form_input(array("class"=>"form-control" , "id"=>"estatura", "type"=>"number","name"=>"estatura","placeholder"=>"Estatura", "value"=>$datos_jugador->estatura)); ?>
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                      <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <?php
                                        $options = [
                                            '1'    => 'Masculino',
                                            '2'  => 'Femenino'
                                            ];
                                         ?>
                                        <?= form_dropdown(array("class"=>"form-control" , "id"=>"sexo","name"=>"sexo", "value"=>set_value('sexo')),$options); ?>
                                      </div>
                                  </div>
                                  <div class="col-sm-12 col-lg-6">
                                      <div class="form-group">
                                        <label>Fecha nacimiento:</label>
                                          <div class="input-group date" id="input_fecha_nacimineto"   data-target-input="nearest">
                                              <?= form_input(array("class"=>"form-control datetimepicker-input", "data-target" =>"#input_fecha_nacimineto", "id"=>"fecha_nacimiento", "type"=>"text","name"=>"fecha_nacimiento","placeholder"=>"Fecha nacimiento","value"=>$datos_jugador->fecha_nacimiento)); ?>
                                              <div class="input-group-append" data-target="#input_fecha_nacimineto" data-toggle="datetimepicker">
                                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </fieldset>
                            <hr>
                            <h4>Datos equipo</h4>
                            <hr>
                            <fieldset>
                                <div class="row">
                                  <div class="col-sm-12 col-lg-4">
                                      <div class="form-group">
                                        <label>Equipo</label>
                                        <select class="form-control select2bs4" name= "id_equipo" style="width: 100%;">
                                            <option value='<?= $equipo->id_equipo ?>'><?= $equipo->nombre_equipo ?></option>
                                            <?php
                                                foreach ($equipos as $id =>$equipo) {
                                                    echo '<option value='.$equipo->id_equipo.'>'.$equipo->nombre_equipo.'</option>';
                                                }
                                             ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Posicion</label>
                                        <?= form_input(array("class"=>"form-control" , "id"=>"poscion", "type"=>"text","name"=>"posicion","placeholder"=>"Posición", "value"=>$datos_jugador->posicion)); ?>
                                      </div>
                                  </div>
                                  <div class="col-sm-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Número juego</label>
                                        <?= form_input(array("class"=>"form-control" , "id"=>"numero", "type"=>"text","name"=>"numero","placeholder"=>"Número juego", "value"=>$datos_jugador->numero)); ?>
                                      </div>
                                  </div>
                                  <?= form_input(array("class"=>"form-control" , "type"=>"hidden", "id"=>"id_jugador", "name"=>"id_jugador", "value"=>$datos_jugador->id_jugador)); ?>
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
                        <?= form_open_multipart(base_url("jugador_detalles/actualizar_foto"),array("class"=>"m-t","id"=>"formulario_registro")); ?>
                          <div class="card-body">
                              <?php if(isset($validation)) :?>
                                <?=  ' <div class="unstyle"><span class="text-danger  text-center">'.$validation->listErrors().'</span></div>'?>
                              <?php endif ?>
                              <h4>Foto</h4>
                              <hr>
                              <fieldset>
                                <div class="form-group">
                                  <label for="exampleInputFile">Foto jugador</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" name="foto_jugador" class="custom-file-input" id="foto_jugador">
                                      <label class="custom-file-label" for="foto_jugador">Elige una foto</label>
                                    </div>
                                  </div>
                                </div>
                                <?= form_input(array("class"=>"form-control" , "type"=>"hidden", "id"=>"id_jugador", "name"=>"id_jugador", "value"=>$datos_jugador->id_jugador)); ?>

                            </fieldset>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary  float-right">Guardar</button>
                          </div>
                          <?= form_close(); ?>
                      </div>


                  </section>
                </div>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
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
      $('#input_fecha_nacimineto').datetimepicker({
          format: 'L'
      });
      $('.select2').select2()
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })


  });
</script>
