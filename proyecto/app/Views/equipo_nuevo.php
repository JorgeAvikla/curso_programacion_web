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
              <h3 class="card-title">Datos de equipo</h3>
            </div>
            <?= form_open_multipart(base_url("equipo_nuevo/registrar_equipo"),array("class"=>"m-t","id"=>"formulario_registro")); ?>
              <div class="card-body">
                  <?php if(isset($validation)) :?>
                    <?=  ' <div class="unstyle"><span class="text-danger  text-center">'.$validation->listErrors().'</span></div>'?>
                  <?php endif ?>
                  <h4>Datos</h4><small>*Todos los campos son obligatorios</small>
                  <hr>
                  <fieldset>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                          <div class="form-group">
                            <label for="name">Nombre equipo (*)</label>
                            <?= form_input(array("class"=>"form-control" , "id"=>"nombre_equipo", "type"=>"text","name"=>"nombre_equipo","placeholder"=>"Nombre equipo", "value"=>set_value('nombre_equipo'))); ?>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                              <label>Categoría de equipo (*)</label>
                              <select class="form-control select2bs4" name= "id_categoria_equipo" style="width: 100%;">
                                  <?php
                                      foreach ($categorias_equipos as $id =>$categoria) {
                                          echo '<option value='.$categoria->id_categoria_equipo.'>'.$categoria->nombre_categoria .'</option>';
                                      }
                                   ?>
                              </select>
                            </div>
                         </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">Imagen equipo (*)</label>
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


  });
</script>
<script>
    <?= isset($alerta) ?  $alerta: '';?>
</script>
