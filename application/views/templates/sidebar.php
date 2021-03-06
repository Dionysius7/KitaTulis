   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
           <div class="sidebar-brand-icon">
               <i class="fas fa-user-tie"></i>
           </div>
           <div class="sidebar-brand-text mx-3">KitaTulis.com</div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider">
       <!-- Heading -->
       <div class="sidebar-heading">
           Admin
       </div>
       <!-- Nav Item - Dashboard -->
       <li class="nav-item">
           <a class="nav-link" href="<?= base_url('admin/viewDashboard'); ?>">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
           User
       </div>

       <!-- Nav Item - Charts -->
       <li class="nav-item">
           <a class="nav-link" href="<?= base_url('admin/listuser'); ?>">
               <i class="fas fa-fw fa-user-friends"></i>
               <span>List Users</span></a>
       </li>
       <!-- Nav Item - Charts -->
       <li class="nav-item">
           <a class="nav-link" href="<?= base_url('admin/listpost'); ?>">
               <i class="fas fa-fw fa-book"></i>
               <span>List Post</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Nav Item - Charts -->
       <li class="nav-item">
           <a class="nav-link" href="<?= base_url('super/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
               <i class="fas fa-fw fa-sign-out-alt"></i>
               <span>Logout</span></a>
       </li>


       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

   </ul>
   <!-- End of Sidebar -->