<?php  
	foreach ($editstaff as $staff)
	{
		$staffid = $staff->staffid;
		$staffname = $staff->staffname;
		$email = $staff->email;
		$phone = $staff->phone;
		$address = $staff->address;
		$role = $staff->role;
		$profilepicture = $staff->profilepicture;
	} 
?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-user-friends"></i> User</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
	 <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-info">Edit User</h6>
		<a href="<?=base_url()?>user" class="btn btn-info">Back</a>
		
      </div>
	
      
      <div class="card-body">
        <?php echo form_open_multipart(base_url().'user/edit/'.$id);?>

        <input type="hidden" name="id" value="<?= $staffid ?>">

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="staffname" class="form-control" id="name" placeholder="Enter Name" required autofocus value="<?= $staffname ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="profile" class="col-sm-2 col-form-label">Profile : </label>
            <div class="col-sm-10">
             	<nav>
							  <div class="nav nav-tabs" id="nav-tab" role="tablist">
							    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Image</a>
							    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Image</a>
							  </div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
							  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							  	<input type="hidden" name="oldprofile" value="<?= $profilepicture ?>">
							  	<img src="<?php echo base_url().$profilepicture ?>" width="100">
							  </div>
							  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							  	<input type="file" name="profile" accept="image/png,image/jpeg,image/gif,"/ class="my-5">
							  </div>
							</div>
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address" required autocomplete="off" value="<?= $email ?>">
              <?php if(form_error('email')) echo "<div class='invalid-feedback'>This email is already Existed!</div>"; ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone: </label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required value="<?= $phone ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter Address" required><?= $address ?></textarea>
            </div>
          </div>
		   <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role: </label>
            <div class="col-sm-10">
              <select class="form-control" id="role" name="role">
                <option value="Admin" <?php if($role=='Admin') echo "selected" ?>>Admin</option>
                <option value="Manager" <?php if($role=='Manager') echo "selected" ?>>Manager</option>
              </select>
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
