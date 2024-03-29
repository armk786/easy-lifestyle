
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-user-friends"></i>User</h1>
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
	 <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-info">Add User</h6>
		<a href="<?=base_url()?>user" class="btn btn-info">Back</a>
		
      </div>
	
      <div class="card-body">
        <?php echo form_open_multipart(base_url().'user/add/');?>

        

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="staffname" class="form-control" id="name" placeholder="Enter Name" required autofocus >
            </div>
          </div>
		  
		   <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Image: </label>
            <div class="col-sm-10">
             <input type="file" name="profile" accept="image/png,image/jpeg,image/gif,"/ class="form-control">
            </div>
          </div>


          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address" required autocomplete="off" >
             
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone: </label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter Address" required></textarea>
            </div>
          </div>
		   <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role: </label>
            <div class="col-sm-10">
              <select class="form-control" id="role" name="role">
                <option value="Admin">Admin</option>
                <option value="Manager">Manager</option>
              </select>
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="submit" name="btnsave" value="Submit" class="btn btn-info">
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
