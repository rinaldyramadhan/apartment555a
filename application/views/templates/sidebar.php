
<?php if ($this->session->userdata('role') == 'Admin'): ?>
  

<ul class="sidebar navbar-nav bg-primary">
  <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
      <span>Dashboard</span>
    </a>
  </li>
   <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'manage' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manage</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Manage:</h6>
          <a class="dropdown-item" href="<?php echo base_url('admin/manage'); ?>"> Admin</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/manage/user'); ?>"> User</a>
        </div>
      </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/laporan'); ?>">
      <span>Laporan</span>
    </a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'apartment' ? 'active' : '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/apartment'); ?>">
      <span>Apartment</span></a>
  </li>

  <li class="nav-item <?php echo $this->uri->segment(2) == 'sewa' ? 'active' : '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/sewa'); ?>">
      <span>Sewa</span></a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'verifikasi' ? 'active' : '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/verifikasi'); ?>">
      <span>Verifikasi Pembayaran</span></a>
  </li>
</ul>


<?php elseif ($this->session->userdata('role') == 'Penyewa'): ?>


<ul class="sidebar navbar-nav">
  <li class="nav-item <?php echo $this->uri->segment(2) == '' || '' ? 'active' : '' ?>">
    <a href="<?php echo base_url(''); ?>" title="" class="nav-link">
     <span>Home</span> 
    </a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
    <a class="nav-link" href="<?php echo base_url('user/dashboard'); ?>">
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'konfirmasi' ? 'active' : '' ?>">
    <a class="nav-link" href="<?php echo base_url('user/konfirmasi'); ?>">
      <span>Konfirmasi Pembayaran</span></a>
  </li>

  <li class="nav-item <?php echo $this->uri->segment(2) == 'riwayatsewa' ? 'active' : '' ?>">
    <a class="nav-link" href="<?php echo base_url('user/riwayatsewa/'); ?>">
      <span>Riwayat Sewa</span></a>
  </li>
</ul>

<?php else: ?>
<?php endif; ?>


