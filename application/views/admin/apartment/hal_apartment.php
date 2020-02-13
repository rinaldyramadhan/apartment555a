<div class="row">
  <div class="col-xl-12">  

    <?php echo $this->session->flashdata('pesan')?>

    <div class="card text-dark">
      <div class="card-header">
        <a href="<?php echo base_url('admin/apartment/tambah'); ?>" title=""><i class="fas fa-plus"></i> Tambah</a>
      </div>
      <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-hover" width="100%" id="dataTable">
              <thead class="text-center">
                <tr>
                  <th>Nama Apartment</th>
                  <th>Alamat</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Foto</th>
                  <th>Status</th>
                  <th class="text-center">Aksi</th>
                </tr>

              </thead>
              <tbody>
                <?php foreach ($content->result() as $c):?>
                <tr>
                  <td width="100"><?php echo $c->nama_apartment; ?></td>
                  <td width="100"><?php echo substr($c->alamat_apartment,0,50); ?>..</td>
                  <td width="100">Rp.<?php echo number_format($c->harga_apartment,0,'.','.'); ?></td>
                  <td width="100"><?php echo substr($c->deskripsi_apartment,0,50) ?>...</td>
                  <td width="100"><img src="<?php echo base_url('assets/image/'.$c->foto1) ; ?>" alt="foto apartment" width="100" height="100"></td>
                  <td width="50" > <a href="<?php echo base_url('admin/apartment/ubah_status/'.$c->status_apartment) ?>/<?php echo $c->id_apartment ?>" title="" class="badge badge-warning"> <i class="fas fa-change"></i> <?php echo $c->status_apartment  ?></a></td>
                  <td width="100">
                    <a href="<?php echo base_url('admin/apartment/edit/'.$c->id_apartment) ?>" title="" class="badge badge-primary"> <i class="fas fa-edit"></i> Edit</a>
                    <a href="<?php echo base_url('admin/apartment/hapus/'.$c->id_apartment) ?>" title="" class="badge badge-danger"> <i class="fas fa-trash"></i> Hapus</a>

                  </td>

                </tr>
                <?php endforeach?>

              </tbody>
            </table>
        </div>
      </div>
      
    </div>
  </div>
</div>
