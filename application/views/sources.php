<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-suitcase"></i> Lead Source</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-info">Source List</h6>
		<a href="<?=base_url()?>leads/add_source" class="btn btn-info">Add</a>
		
      </div>
      <div class="card-body">
	  
	   <?php if($this->session->flashdata('successmsg')){?>
				<div class="alert alert-success text-center" role="alert">
				<?= $this->session->flashdata('successmsg')?>
				</div>
				<?php }?>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
			    <th>Sr.</th>
                <th>Source ID</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($sources as $source): 
                $i++;
                $id = $source->id;
                $name = $source->name;
              ?>
              <tr>
			     <td><?= $i?></td>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td>
                  <a href="<?php echo base_url(); ?>leads/source_edit/<?= $id ?>" class="btn btn-outline-success btn-sm">
                    <i class="far fa-edit"></i> Edit
                  </a>
                  <a href="<?php echo base_url(); ?>leads/source_delete/<?= $id ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"><i class="far fa-trash-alt"></i> Remove</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
