<div class="row">
  <div class="col-xl-12">
    <?php
                    ini_set("display_errors",0);

     echo $this->session->flashdata('pesan'); ?>
    <div class="card">
      <div class="card-header row">
        <div class="col-xl-6">
        <h5>Daftar Sewa<span class="text-primary"><?php echo $penyewa['nama'] ?></span> </h5>
          
        </div>
        <div class="col-xl-6 text-right">
          <a class=" btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Hapus</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm table-bordered text-center" id="dataTable">
            <thead>
              <tr>
                <th>ID Sewa</th>
                <th>Admin</th>
                <th>Penyewa</th>
                <th>Total Bayar</th>
                <th>Sisa Pembayaran</th>
                <th>Batas Waktu Pembayaran</th>
                <th>Status</th>
                <th>Total Tagihan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php  foreach ($content->result_array() as $c) : ?>
              <tr>
                <td width=""><?php echo $c['id_sewa'] ?></td>
                <td width=""><?php echo $c['id_admin'] ?></td>
                <td width=""><?php echo $c['nama_penyewa'] ?></td>
                <td width="">Rp.<?php echo number_format($c['total_bayar'],0,'.','.') ?></td>        
                <td width="">
                        <?php 
                          $sisa_pembayaran =  $c['jumlah_total']-$c['total_bayar'];
                          if ($sisa_pembayaran == 0): ?>
                            <!-- Jika Sisa Pembayaran 0 makan munculkan - (strip) -->
                          <?php echo '-' ?>         
                        <?php else: ?>
                          Rp.<?php echo number_format($sisa_pembayaran,0,'.','.') ?>
                        <?php endif; ?>
                </td>
                <td>  <?php  
                        $durasi = (abs(strtotime($c['tgl_jatuhtempo'])-strtotime(date('Y-m-d')))/(60*60*24));
                        if ($durasi == 0) : ?>
                          <!-- jika durasi 0 maka munculkan strip -->
                          <?php  echo "-"; ?>

                          <?php elseif ($c['status_sewa'] == 'Lunas'): ?>
                            <!-- jika status sewa Lunas maka munculkan strip -->
                            <?php echo '-' ?>

                          <?php  else : ?>
                            <?php  echo $durasi." Hari" ; ?>
                            
                          <?php  endif; ?>
                </td>         
                <td width=""><?php echo $c['status_sewa'] ?></td>
                <td width="">Rp. <?php echo number_format($c['jumlah_total'],0,'.','.') ?></td>
                <td width="">
                  <a href="<?php echo base_url('admin/sewa/detail/'.$c['id_sewa']); ?>" title="" class="text-primary"><i class="fas fa-eye"></i></a> 
                  <a href="<?php echo base_url('admin/sewa/delete/'.$c['id_sewa']); ?>" title="" class="text-danger"><i class="fas fa-trash"></i></a> 
                </td>

              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>  
        
      </div>
    </div>
  </div>
</div>