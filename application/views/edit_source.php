<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-suitcase"></i> Lead Source</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
	 <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-info">Edit Lead Source</h6>
		<a href="<?=base_url()?>leads/source" class="btn btn-info">Back</a>
		
      </div>
     
      <div class="card-body">
        <form method="post" action="<?php echo base_url(); ?>leads/source_edit/<?=$source->id?>" >

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?=$source->name?>" class="form-control" id="name" placeholder="Name" required autofocus >
              
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="submit" name="btnsave" value="Update" class="btn btn-info">
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
