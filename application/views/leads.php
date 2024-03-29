<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-suitcase-rolling"></i> Leads</h1>

    <!-- DataTales Example -->
    <div class="card shadow my-4">
	
	  <div class="card-header py-3 ">
	   <div class="row">
	    <div class="col-sm-6">
        <h6 class="m-0 font-weight-bold text-info">List</h6>
		</div>
		<!--
		<div class="col-sm-6 d-flex justify-content-end ">
			<a href="<?=base_url()?>leads/add" class="btn btn-info">Add</a>&nbsp;&nbsp;
			<a href="<?=base_url()?>user/add" class="btn btn-warning">Bulk Upload</a>
		</div>
		-->
	   </div>
      </div>
	
      
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
          <table class="table table-striped table-bordered" id="leadTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th> 
                <th>Page</th>              
                <th>Date</th>
              </tr>
            </thead>
           
          
		  </table>
        </div>

      </div>
    
    
    
    </div>

  </div>

