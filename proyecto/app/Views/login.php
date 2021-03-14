<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url() ?>" class="h1"><b>Core</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingresa tus credenciales para continuar</p>
      <?= form_open(base_url("login/verificar_acceso"),array("class"=>"m-t","id"=>"formulario_registro")); ?>
      <?php if(isset($validation)) :?>
        <?=  ' <div class="unstyle"><span class="text-danger  text-center">'.$validation->listErrors().'</span></div>'?>
      <?php endif ?>
        <div class="input-group mb-3">
          <?= form_input(array("class"=>"form-control" , "id"=>"correo", "type"=>"email","name"=>"correo","placeholder"=>"Correo", "value"=>set_value('correo'))); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <?= form_input(array("class"=>"form-control" , "id"=>"contrasenia", "type"=>"password","name"=>"contrasenia","placeholder"=>"Contraseña", "value"=>set_value('contrasenia'))); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>
