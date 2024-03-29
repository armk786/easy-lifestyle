<!-- Begin Page Content -->
  <div class="container-fluid">
               <?php if($this->session->flashdata('successmsg')){?>
				<div class="alert alert-success text-center" role="alert">
				<?= $this->session->flashdata('successmsg')?>
				</div>
				<?php }?>
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
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=count($user_list);?></div>
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
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=count($leads);?></div>
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
            <h6 class="m-0 font-weight-bold text-info">Leads</h6>
          </div>
          <!-- Card Body -->
           <div class="card-body">
	    <?php if($this->session->flashdata('successmsg')){?>
				<div class="alert alert-success text-center" role="alert">
				<?= $this->session->flashdata('successmsg')?>
				</div>
	   <?php }?>

       <!--  Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Leads</h6>
          </div>
          <!-- Card Body -->
           <div class="card-body">
      <?php if($this->session->flashdata('successmsg')){?>
        <div class="alert alert-success text-center" role="alert">
        <?= $this->session->flashdata('successmsg')?>
        </div>
     <?php }?>
     
    <div class="row ">
      <div class="col-sm-8 mx-auto filterdate">
           <form id="search" role="form" style="border:0">
                <div class="row"> 
                <div class="col-5">
              
         
                <input type="text" class="form-control" placeholder="From Date"  id="from_datepicker" />
            </div>    
                <div class="col-5">
                    
          
                    <input type="text" class="form-control "  placeholder="To Date" id="to_datepicker" />
                </div>
         
                <div class="col-2">
                    
                    <button class="btn btn-primary" type="button" id="datefilter">Search</button>
    
                </div>
         </div>
      

     
    </form>
      </div>
   
  </div>
  <!-- Row -->

        <div class="table-responsive">
          <table class="table table-striped nowrap" id="leadTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th> 
                <th>Visiting</th>  
                 <th>Message</th>              
				        <th>Date</th>
              </tr>
            </thead>
           
          
		  </table>
        </div>

      </div>
        
        
        
        </div>
      </div>

	</div>

    <!-- Content Row -->

  </div>
  <!-- /.container-fluid -->