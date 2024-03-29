<?php 
  if ($this->session->userdata('role') == '') {
    echo "<script>alert('Please Log in First!')</script>";
    redirect(base_url() . 'login', 'refresh');
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Easy Life Style</title>

  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/thinfev.png">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- summer note -->
   <?php if($this->uri->segment(1) == "Faq" && ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "edit")) echo '<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">'; ?>

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
     <link href='https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css' rel='stylesheet' type='text/css'>
  <link href='https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css' rel='stylesheet' type='text/css'>
  <!-- jQuery Library -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  
  
    
   
  
  <style>
      .dt-search{float: right;}
  </style>


  <style type="text/css">
    body, .form-control, th, td {
      color: #555 !important;
    }
    #clickable-table td {
      padding: 0 !important;
    }
    #clickable-table a {
      display: block;
      color: #555 !important;
      padding: .75rem;
    }
    #clickable-table a:hover {
      text-decoration: none;
    }
    
        .exportExcel{
        padding: 5px;
        border: 1px solid grey;
        margin: 5px;
        cursor: pointer;
        }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>dashboard">
        <div class="sidebar-brand-icon">
         <!-- <img src="<?php echo base_url(); ?>assets/thinlogo.png" class="img-fluid"> -->
         <i class="fa fa-share" style="font-size:48px;color:#af9268"></i>
        </div>
       
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($this->uri->segment(1) == "dashboard") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>dashboard">
          <i class="fas fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
    
     <li class="nav-item <?php if($this->uri->segment(1) == "user") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>user">
          <i class="fas fa-user-friends"></i>
          <span>User</span></a>
      </li>

     
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Leads :
      </div>
    
     <li class="nav-item <?php if($this->uri->segment(1) == "leads") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>leads">
          <i class="fas fa-suitcase-rolling"></i>
          <span>Leads</span></a>
       </li>

      <!-- Tour Nav Item -->
      <li class="nav-item <?php if($this->uri->segment(2) == "source") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>leads/source">
          <i class="fas fa-suitcase"></i>
          <span>Source</span></a>
      </li>
    
      <li class="nav-item <?php if($this->uri->segment(2) == "status") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>leads/status">
          <i class="fas fa-fw fa-table"></i>
          <span>Status</span></a>
      </li>
     
      <!-- Divider -->
      <hr class="sidebar-divider">
    
     <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>login/logout">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Heading -->
     

      <!-- Tour Nav Item -->
    
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link text-info d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         
         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-info" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('staffname'); ?></span>
                <?php $profile = base_url().$this->session->userdata('profilepicture') ?>
                <img class="img-profile rounded-circle" src="<?php echo $profile ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url().'user/profile/'.$this->session->userdata('staffid'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item py-2" href="<?= base_url() . 'user/changepassword/'. $this->session->userdata('staffid'); ?>">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->