<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($userlist) ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Leads</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($tourguidelist) ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-call-volume fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Recent Leads</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tour Name</th>
                  <th>Guided by</th>
                  <th>Cost(USD)</th>
                  <th>Booked Times</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                  $i = 0;
                  foreach ($toptourlist as $tour): 
                  $i++;
                  $id = $tour->tourid;
                  $name = $tour->name;
                  $regionname = $tour->regionname;
                  $country = $tour->country;
                  $tourprice = $tour->tourprice;
                  $tourguidename = $tour->tourguidename;
                  $count = $tour->count;
                  $transportationid = $tour->transportationid;
                  $tourstatus = $tour->tourstatus;

                  if ($transportationid != NULL) {
                    $tid = 't_s';
                  } else {
                    $tid = 't_c';
                  }
                ?>
                <tr>
                  <th><?= $i ?></th>
                  <td><?= $name ?><br><small>(<?= $regionname ?>, <?= $country ?>)</small></td>
                  <td><?= $tourguidename ?></td>
                  <td><?= $tourprice ?></td>
                  <td><?= $count ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>index.php/Tour/detail/<?= $id ?>/<?= $tourstatus ?>/<?= $tid ?>" class="btn btn-outline-info btn-sm">
                    <i class="far fa-eye"></i> View
                  </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      
    
	
	</div>

    <!-- Content Row -->

  </div>
  <!-- /.container-fluid -->