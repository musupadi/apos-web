<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= count($item) ?></h3>

              <p>All Items</p>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <?php if ( $user[0]->id_role == 1 || $user[0]->id_role == 2 ) { ?>
              <a href="<?= base_url('inventory/item') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } else { ?>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= count($transactionInOut) ?></h3>

              <p>Transaction In & Out</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <?php if ( $user[0]->id_role == 1 || $user[0]->id_role == 2 ) { ?>
              <a href="<?= base_url('home/historyTransaction') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } else { ?>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= count($transactionIn) ?></h3>

              <p>Transaction In</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-in"></i>
            </div>
            <?php if ( $user[0]->id_role == 1 || $user[0]->id_role == 2 ) { ?>
              <a href="<?= base_url('home/historyTransaction') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } else { ?>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= count($transactionOut) ?></h3>

              <p>Transaction Out</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-out"></i>
            </div>
            <?php if ( $user[0]->id_role == 1 || $user[0]->id_role == 2 ) { ?>
              <a href="<?= base_url('home/historyTransaction') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } else { ?>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } ?>
          </div>
        </div>
        <!-- ./col -->
      </div>


      <div class="container-announcement">
        <div class="header">
          <h3>Announcement</h3>
          <hr>
        </div>
        <main>
        <?php foreach($announcement as $data) : ?>
          <div class="card">
            <h3><?= date_format(date_create($data->date),"d M Y")?></h3>
            <div class="content-card">
              <h4><?php echo $data->title?></h4>
              <hr>
              <a href="<?= base_url('Announcement/moreInfo/' . $data->id) ?>" class="btn btn-primary">More Info</a>
            </div>
          </div>
        <?php endforeach ?>
        
     
     



      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    <script src="<?= base_url('vendor/components/chart.js/dist/Chart.min.js') ?>"></script>
    <script>
        // Get data passed from controller
        var chartData = <?php echo json_encode($user); ?>;
        
        // Create Chart.js instance
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Your Dataset',
                    data: chartData.data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>