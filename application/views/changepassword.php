<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Locals One Tour Guide Booking System</title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/logo.png">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="<?php echo base_url(); ?>assets/backend/img/CP.jpg" class="img-fluid">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Update your password!</h1>
					
                  </div>
				   
				  
				  <?php if($this->session->flashdata('errormsg')){?>
				   <div class="alert alert-danger text-center" role="alert">
				   <?= $this->session->flashdata('errormsg')?>
				  </div>
				   <?php }?>
                   <form class="user" method="post" action="<?php echo base_url(); ?>user/updatepassword">
                  
                    <input type="hidden" name="id" value="<?= $this->uri->segment(3); ?>">
                    <div class="form-group">
                      <label class="pl-2" for="cpassword"><small>Current Password</small></label>
                      <input type="password" class="form-control form-control-user" id="cpassword" name="cpassword" placeholder="Enter Current Password" required>
                    </div>
                    <div class="form-group">
                      <label class="pl-2" for="password"><small>New Password</small></label>
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter New Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>
                    <div class="form-group">
                      <label class="pl-2" for="crpassword"><small>Confirm Password </small></label><small id="message" class="pl-4"></small>
                      <input type="password" class="form-control form-control-user" id="crpassword" name="crpassword" placeholder="Enter Confirm Password" required>
                      
                    </div>
                    
                    <button class="btn btn-primary btn-user btn-block font-weight-bold" type="submit"  id="btnchangepassword">
                      <big>Save</big>
                    </button>
					
                    
                  </form>
				 
                  <hr>
                </div>
				<div class="text-center">
                    
                    <a href="<?= base_url() ?>dashboard" class="pl-md-2"><i class="fas fa-home"></i> Dashboard</a>
                  </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/backend/js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
  $('#editprofile').hide();
  $('#changepassword').hide();

  $(document).ready(function(){

    $('#crpassword').on('keyup', function () {
      if ($('#crpassword').val() == "") {
        $('#btnchangepassword').attr("disabled", false);
        $('#message').html('Please confirm your password');
      }
      else if ($('#password').val() != $('#crpassword').val()) {
        $('#message').html('(Not Matching)').css('color', 'red');
        $('#btnchangepassword').attr("disabled", true);
      } else {
        $('#message').html('(Matching)').css('color', 'green');
        $('#btnchangepassword').attr("disabled", false);
      }
    });
  });
</script>
</body>

</html>
