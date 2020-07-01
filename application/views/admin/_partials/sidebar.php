<?php 
/* Deklarasi*/
$cd_akses = $this->session->userdata('role_id');
 ?>
<!-- Page Wrapper -->
    <div id="wrapper">
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/cpmusik/user">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-music"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MMP Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Administrator
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/cpmusik/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item fas fa-sliders-h" href="<?php echo base_url(); ?>slide"> Slider</a>
            <a class="collapse-item fas fa-user-friends" href="<?php echo base_url(); ?>partner"> Partner</a>
            <a class="collapse-item far fa-newspaper" href="<?php echo base_url(); ?>news"> News</a>
            <a class="collapse-item fas fa-feather-alt" href="<?php echo base_url(); ?>pencipta"> Pencipta</a>
            <a class="collapse-item fas fa-music" href="<?php echo base_url(); ?>song"> Song Katalog</a>
          </div>
        </div>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>User</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <?php if (in_array($cd_akses, array('1'))): ?>            
            <a class="collapse-item far fa-registered" href="<?php echo base_url(); ?>register"> Register</a><?php endif ?>
            <a class="collapse-item far fa-edit" href="<?php echo base_url(); ?>datauser"> Edit User</a>         
            <a class="collapse-item fas fa-key" href="<?php echo base_url(); ?>changepassword"> Change Password</a>
            <?php if (in_array($cd_akses, array('1'))): ?>        
            <a class="collapse-item fas fa-tasks" href="<?php echo base_url(); ?>usermanagement"> User Management</a><?php endif ?>        
            <div class="collapse-divider"></div>            
          </div>
        </div>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/auth/logout') ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
