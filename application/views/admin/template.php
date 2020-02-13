<?php $this->load->view('templates/head'); ?>

<body id="page-top" class="bg-light">

  <!-- navbar -->
  <?php $this->load->view('templates/navbar')?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('templates/sidebar')?>
    

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
    <?php $this->load->view('templates/breadcrumb')?>
        
        <?php $this->load->view($kontenDinamis)  ?>

      </div>
      <!-- /.container-fluid -->

      <?php $this->load->view('templates/footer')?>
      

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php $this->load->view('templates/modal')?>
  

  <!-- JAVASCRIPT ETC -->
  <?php $this->load->view('templates/js')?>
  