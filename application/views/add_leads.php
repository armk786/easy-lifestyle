<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
	
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-suitcase-rolling"></i> Lead</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
	 <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-info">Add New Lead</h6>
		<a href="<?=base_url()?>leads" class="btn btn-info">Back</a>
		
      </div>
	
      
      <div class="card-body">
        <?php echo form_open_multipart(base_url().'/leads/add');?>
		
		<div class="form-group row">
           
            <div class="col-sm-4">
			 <label for="source" class="col-form-label">Source: </label>
              <select class="form-control" id="source" name="source" required>
                <option value="">Select Source</option>
				<?php if(!empty($sources)){
                    foreach($sources as $src)
                    {?>		
					 <option value="<?=$src->id?>"><?=$src->name?></option>
				 <?php }}?>
              
              </select>
            </div>
			
			 <div class="col-sm-4">
			  <label for="status" class="col-form-label">Status: </label>
              <select class="form-control" id="status" name="status" required>
                <option value="">Select Status</option>
				<?php if(!empty($status)){  
				   foreach($status as $st)
                   {?>		
					 <option value="<?=$st->id?>"><?=$st->name?></option>
				<?php } }?>
               
              </select>
              
            </div>
			
			 <div class="col-sm-4">
			  <label for="user" class="col-form-label">Assign User: </label>
              <select class="form-control" id="user" name="user" required>
			  <option value="">Select User</option>
			  <?php if(!empty($manager)){  
				   foreach($manager as $user)
                   {?>		
					 <option value="<?=$user->staffid?>"><?=$user->staffname?></option>
				<?php } }?>
               
             
              </select>
             
            </div>
			
          </div>
		

          <div class="form-group row">
           <div class="col-sm-6">
		    <label for="campaign_name" class="col-form-label">Campaign name: </label>
              <input type="text" name="campaign_name" class="form-control" id="campaign_name" placeholder="Campaign Name" required autofocus value="" >
              
            </div>
			
			<div class="col-sm-6">
			 <label for="educational_qualification" class="col-form-label">Educational Qualification: </label>
              <input type="text" name="educational_qualification" class="form-control" id="educational_qualification" placeholder="Educational Qualification" required autofocus value="" >
              
            </div>
          
		  </div>
		  
		  
		   <div class="form-group row">
           <div class="col-sm-4">
		    <label for="name" class="col-form-label">Name: </label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" required autofocus value="" >
              
            </div>
			
			<div class="col-sm-4">
			 <label for="email" class="col-form-label">Email: </label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autofocus value="" >
              
            </div>
			
			<div class="col-sm-4">
			 <label for="mobile" class="col-form-label">Mobile: </label>
              <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" required autofocus value="" >
              
            </div>
          
		  </div>
		  
		  
		  <div class="form-group row">
           <div class="col-sm-6">
		    <label for="job_title" class="col-form-label">Job Title: </label>
              <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Job Title" required autofocus value="" >
              
            </div>
			
			<div class="col-sm-6">
			 <label for="city" class="col-form-label">City: </label>
              <input type="text" name="city" class="form-control" id="city" placeholder="City" required autofocus value="" >
              
            </div>
			
		  </div>
		  
		 
		  
        
          <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label">Remark: </label>
            <div class="col-sm-10">
              <textarea id="remark" name="remark" class="form-control" placeholder="Remark of lead..." required rows="4"></textarea>
            </div>
          </div>

         

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="submit" name="btnsave" value="Save" class="btn btn-info">
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
