<!-- <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php /*echo base_url(''); ?>"><?php echo SITE_NAME*/ ?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button> -->

    <!-- Navbar Search -->
   <!--  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
 -->
    <!-- Navbar -->
    <!-- <ul class="navbar-nav ml-auto">
      
      <a href="<?php /*echo base_url('home/contact');*/ ?>" title="" class="nav-item nav-link ml-1">Contact</a>
      <li class="nav-item dropdown no-arrow ml-1"> -->

          <?php if ($this->session->userdata('role') == 'Admin' ): ?>

            <nav class="navbar navbar-expand navbar-dark bg-primary static-top">

              <a class="navbar-brand mr-1" href="<?php echo base_url(''); ?>"><?php echo SITE_NAME ?></a>

              <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
              </button>


               <ul class="navbar-nav ml-auto">
                  
                  <a href="<?php echo base_url('home/contact'); ?>" title="" class="nav-item nav-link ml-1">Contact</a>
                  <li class="nav-item dropdown no-arrow ml-1">




            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-fw"></i><?php echo ucfirst($admin['nama']) ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
             <!--  <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activity Log</a>
              <div class="dropdown-divider"></div> -->
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>

          <?php elseif ($this->session->userdata('role') == 'Penyewa' ): ?>

             <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

              <a class="navbar-brand mr-1" href="<?php echo base_url(''); ?>"><?php echo SITE_NAME ?></a>

              <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
              </button>


               <ul class="navbar-nav ml-auto">
                  
                  <a href="<?php echo base_url('home/contact'); ?>" title="" class="nav-item nav-link ml-1">Contact</a>
                  <li class="nav-item dropdown no-arrow ml-1">


             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="img-thumbnail" width="20" src="<?php echo base_url('assets/image/profil/'.$penyewa['foto_profil']); ?>" alt=""><?php echo $penyewa['nama'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?php echo base_url('user/dashboard/setting'); ?>">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>

          <?php else: ?>

              <nav class="navbar navbar-expand navbar-dark bg-primary static-top">

              <a class="navbar-brand mr-1" href="<?php echo base_url(''); ?>"><?php echo SITE_NAME ?></a>

              <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
              </button>


               <ul class="navbar-nav ml-auto">
                  
                  <a href="<?php echo base_url('home/contact'); ?>" title="" class="nav-item nav-link ml-1">Contact</a>
                  <li class="nav-item dropdown no-arrow ml-1">


          <a href="<?php echo base_url('login') ?>" class="nav-item nav-link text-white btn btn-sm btn-primary">Login/Register</a>
          <?php endif; ?>
        
      </li>
    </ul>

  </nav>