<?php
    /* MENGHILANGKAN ERROR NOTICE */ 
    ini_set("display_errors",0); 
    /* MENGHILANGKAN ERROR NOTICE */ 

?>
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header">
        <h5>Detail Sewa <a class="badge badge-primary">ID Sewa : <?php echo $this->uri->segment(4) ?></a> </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover text-center" id="dataTable">
            <thead>
              <tr>
                <th>ID Sewa</th>
                <th>Penyewa</th>
                <th>ID Apartment</th>
                <th>Apartment</th>
                <th>Durasi</th>
                <th>Status</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php  foreach ($content->result_array() as $c) : ?>
              <tr>
                <td width=""><?php echo $c['id_sewa'] ?></td>
                <td width=""><?php echo $c['nama_penyewa'] ?></td>
                <td width=""><?php echo $c['id_apartment'] ?></td>
                <td width="10000"><?php echo $c['nama_apartment'] ?></td>
                <td width="500">
                  <?php 
                    $durasi = $c['lama_sewa'];
                  if ($durasi >= 12): ?>
                    1 Tahun
                  <?php elseif ($durasi >= 24): ?>
                    2 tahun
                  <?php else: ?>
                    <?php echo $c['lama_sewa'] ?> Bulan
                  <?php endif; ?>     
                </td>
                <td width=""><?php echo $c['status_sewa'] ?></td>

                <td width="">Rp.<?php echo number_format($c['total_harga'],0,'.','.') ?></td>
                <td width="">
                  <a href="<?php echo base_url('admin/sewa/invoice/'.$c['id_sewa']); ?>" title="" class="text-primary"><i class="fas fa-eye"></i></a> 
                </td>
              </tr>
              <?php endforeach ?>
              <tr>		
              	<td colspan="6">Total Harga</td>
              	<td>Rp.<?php echo number_format($total,0,'.','.') ?></td>
              </tr>
            </tbody>
          </table>
        </div>  
        
      </div>
    </div>
  </div>
</div>