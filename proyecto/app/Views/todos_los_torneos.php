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
      <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Todos los jugadores</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="todos_los_jugadores" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Categoría</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if ($torneos != NULL) {
                        foreach ($torneos as $torneo) {
                            echo '
                            <tr>
                              <td>'.$torneo->id_torneo.'</td>
                              <td>'.$torneo->nombre_torneo.'</td>
                              <td>'.$torneo->nombre_categoria.'</td>
                              <td class="text-center">
                                  <div class="btn-group">
                                  <a href="'.base_url('routing/'.TAREA_TORNEO_DETALLES).'/'.$torneo->id_torneo.'"  class="btn btn-primary">Ver</a>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                      <a class="dropdown-item" onclick=eliminar_jugador('.$torneo->id_torneo.') href="#">Eliminar</i></a>
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
      </section>
    </div>
  </div>
</section>

<script>
  $(function () {
    $("#todos_los_jugadores").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#todos_los_jugadores_wrapper .col-md-6:eq(0)');
  });

  function eliminar_jugador(id_torneo){
    Swal.fire({
       title: '¿Estás seguro de eliminar este jugador?',
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
               url: "todos_los_torneos/eliminar_torneo",
               data: {"id_torneo": id_torneo},
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
