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
      <section class="col-lg-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <?= form_open_multipart(base_url("jugador_nuevo/registrar_jugador"),array("class"=>"m-t","id"=>"formulario_registro")); ?>
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
                            <?= form_input(array("class"=>"form-control" , "id"=>"nombre", "type"=>"text","name"=>"nombre","placeholder"=>"Nombre", "value"=>set_value('nombre'))); ?>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                          <div class="form-group">
                            <label for="apellido_paterno">Paterno</label>
                            <?= form_input(array("class"=>"form-control" , "id"=>"apellido_paterno", "type"=>"text","name"=>"apellido_paterno","placeholder"=>"Apellido paterno", "value"=>set_value('apellido_paterno'))); ?>
                          </div>
                      </div>
                      <div class="col-sm-12 col-lg-4">
                          <div class="form-group">
                            <label for="apellido_materno">Materno</label>
                            <?= form_input(array("class"=>"form-control" , "id"=>"apellido_materno", "type"=>"text","name"=>"apellido_materno","placeholder"=>"Apellido materno", "value"=>set_value('apellido_materno'))); ?>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                          <div class="form-group">
                            <label for="edad">Edad</label>
                            <?= form_input(array("class"=>"form-control" , "id"=>"edad", "type"=>"number","name"=>"edad","placeholder"=>"Edad", "value"=>set_value('edad'))); ?>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                          <div class="form-group">
                            <label for="estatura">Estatura</label>
                            <?= form_input(array("class"=>"form-control" , "id"=>"estatura", "type"=>"number","name"=>"estatura","placeholder"=>"Estatura", "value"=>set_value('estatura'))); ?>
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
                                  <?= form_input(array("class"=>"form-control datetimepicker-input", "data-target" =>"#input_fecha_nacimineto", "id"=>"fecha_nacimiento", "type"=>"text","name"=>"fecha_nacimiento","placeholder"=>"Fecha nacimiento", "value"=>set_value('fecha_nacimiento'))); ?>
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
                            <?= form_input(array("class"=>"form-control" , "id"=>"poscion", "type"=>"text","name"=>"posicion","placeholder"=>"Posición", "value"=>set_value('posicion'))); ?>
                          </div>
                      </div>
                      <div class="col-sm-12 col-lg-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Número juego</label>
                            <?= form_input(array("class"=>"form-control" , "id"=>"numero", "type"=>"text","name"=>"numero","placeholder"=>"Número juego", "value"=>set_value('numero'))); ?>
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">Foto jugador</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="foto_jugador" class="custom-file-input" id="foto_jugador">
                          <label class="custom-file-label" for="foto_jugador">Elige una foto</label>
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
<script>
    <?= isset($alerta) ?  $alerta: '';?>
</script>
