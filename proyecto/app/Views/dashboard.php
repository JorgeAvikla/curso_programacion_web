<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url("routing/".TAREA_DASHBOARD)?>"><?= $navegacion['tarea_principal'] ?></a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>
            <p>Equipos</p>
          </div>
          <div class="icon">
              <i class="fas fa-shield-alt"></i>
          </div>
          <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
            <p>Jugadores</p>
          </div>
          <div class="icon">
              <i class="fas fa-running"></i>
          </div>
          <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>44</h3>

            <p>Partidos</p>
          </div>
          <div class="icon">
              <i class="fas fa-list"></i>
          </div>
          <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>
            <p>Categorías</p>
          </div>
          <div class="icon">
              <i class="fas fa-clipboard-list"></i>
          </div>
          <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <section class="col-lg-7 connectedSortable">
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Últimos partidos</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                      <th>ID partido</th>
                      <th>Equipos</th>
                      <th>Estado</th>
                      <th>Categoría</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="badge badge-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="badge badge-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="badge badge-info">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Añadir partido</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Más partidos</a>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Últimos equipos</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                  <div class="product-img">
                    <img src="<?= base_url('recursos_plantilla/dist/img/default-150x150.png') ?>" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                      <span class="badge badge-warning float-right">$1800</span></a>
                    <span class="product-description">
                      Samsung 32" 1080p 60Hz LED Smart HDTV.
                    </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?= base_url('recursos_plantilla/dist/img/default-150x150.png') ?>" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Bicycle
                      <span class="badge badge-info float-right">$700</span></a>
                    <span class="product-description">
                      26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                    </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?= base_url('recursos_plantilla/dist/img/default-150x150.png') ?>" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">
                      Xbox One <span class="badge badge-danger float-right">
                      $350
                    </span>
                    </a>
                    <span class="product-description">
                      Xbox One Console Bundle with Halo Master Chief Collection.
                    </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?= base_url('recursos_plantilla/dist/img/default-150x150.png') ?>" alt="Product Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">PlayStation 4
                      <span class="badge badge-success float-right">$399</span></a>
                    <span class="product-description">
                      PlayStation 4 500GB Console (PS4)
                    </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.card-footer -->
          </div>
      </section>

      <section class="col-lg-5 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Categorías juegos</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="far fa-circle text-danger"></i> Chrome</li>
                    <li><i class="far fa-circle text-success"></i> IE</li>
                    <li><i class="far fa-circle text-warning"></i> FireFox</li>
                    <li><i class="far fa-circle text-info"></i> Safari</li>
                    <li><i class="far fa-circle text-primary"></i> Opera</li>
                    <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Futbol
                    <span class="float-right text-danger">
                      12%</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Basquetbol
                    <span class="float-right text-success">
                     </i> 4%
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Voelibol
                    <span class="float-right text-warning">
                    </i> 0%
                    </span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Latest Members</h3>
                <div class="card-tools">
                  <span class="badge badge-success">Máximos anotadores</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  <li>
                    <img src="<?=base_url('recursos_plantilla/dist/img/user1-128x128.jpg') ?>" alt="User Image">
                    <a class="users-list-name" href="#">Alexander Pierce</a>
                    <span class="users-list-date">Today</span>
                  </li>
                  <li>
                    <img src="<?=base_url('recursos_plantilla/dist/img/user8-128x128.jpg') ?>" alt="User Image">
                    <a class="users-list-name" href="#">Norman</a>
                    <span class="users-list-date">Yesterday</span>
                  </li>
                  <li>
                    <img src="<?=base_url('recursos_plantilla/dist/img/user7-128x128.jpg') ?>" alt="User Image">
                    <a class="users-list-name" href="#">Jane</a>
                    <span class="users-list-date">12 Jan</span>
                  </li>
                  <li>
                    <img src="<?=base_url('recursos_plantilla/dist/img/user6-128x128.jpg') ?>" alt="User Image">
                    <a class="users-list-name" href="#">John</a>
                    <span class="users-list-date">12 Jan</span>
                  </li>
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:">Ver todos los jugadores</a>
              </div>
            </div>
      </section>
    </div>
  </div><!-- /.container-fluid -->
</section>
<script>
$( document ).ready(function() {
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = {
      labels: [
        'Chrome',
        'IE',
        'FireFox',
        'Safari',
        'Opera',
        'Navigator'
      ],
      datasets: [
        {
          data: [700, 500, 400],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
        }
      ]
    }
    var pieOptions = {
      legend: {
        display: false
      }
    }
    // Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // eslint-disable-next-line no-unused-vars
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions
    })
});
</script>
<script>
    <?= mostrar_mensaje(); ?>
</script>
