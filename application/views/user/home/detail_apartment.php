<div class="row justify-content-center">
	<div class="col-xl-12">
		
		<div class="card">
			<div class="card-header">
				
			</div>
			<div class="card-body row">
				<div class="col-xl-6">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner">
					  	<?php foreach ($content->result() as $c) :?>
					    <div class="carousel-item active">
					      <img src="<?php echo base_url('assets/image/'.$c->foto1) ?>" class="d-block w-100" width="150" height="500" alt="foto apartment">
					    </div>
					    <div class="carousel-item">
					      <img src="<?php echo base_url('assets/image/'.$c->foto2) ?>" class="d-block w-100" width="150" height="500" alt="foto apartment">
					    </div>
					    <div class="carousel-item">
					      <img src="<?php echo base_url('assets/image/'.$c->foto3) ?>" class="d-block w-100" width="150" height="500" alt="foto apartment">
					    </div>
					    <div class="carousel-item">
					      <img src="<?php echo base_url('assets/image/'.$c->foto4) ?>" class="d-block w-100" width="150" height="500" alt="foto apartment">
					    </div>
					  	<?php endforeach ?>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
				<div class="col-xl-6">
				  	<?php foreach ($content->result() as $c) :?>
				  		<div class="row">
				  			<!--  APARTMENT -->
				  			<div class="col-xl-6">
				  				<h3><?php echo $c->nama_apartment ?></h3>
				  				
				  			</div>
				  			<div class="col-xl-6">
				 			<!-- kosong -->
				  			</div>
				  			<div class="col-xl-12">
				  				<h4 class="text-primary"><small>Rp.</small> <?php echo number_format($c->harga_apartment,0,'.','.') ?>/Bulan</h4>
				  			</div>
				  			<div class="col-xl-12">
				  				<h4><?php echo $c->alamat_apartment ?></h4>
				  				<hr>
				  			</div>

				  			<!-- DESKRIPSI -->
				  			<div class="col-xl-12">
				  				<h5>Deskripsi</h5>
				  				<h5><?php echo $c->deskripsi_apartment ?></h5>
				  				<hr>
				  			</div>

				  			<!-- DETAIL APARTMENT -->
				  			<div class="col-xl-6">
				  			</div>
				  			<div class="col-xl-6">
				  			<!-- kosong -->
				  			</div>
				  	
				  			<div class="col-xl-4">
				  				<h6 class="text-muted"><small>Tipe Apartment</small> <br><?php echo $c->tipe_apartment ?>
				  				<hr></h6>
				  			</div>
				  			<div class="col-xl-4">
				  				<h6 class="text-muted"><small>Luas</small><br><?php echo $c->luas_apartment?><hr></h6>
				  			</div>
				  			<div class="col-xl-4">
				  				<h6 class="text-muted"><small>Listrik</small> <br> <?php echo $c->listrik_apartment?> <hr></h6>
				  			</div>
				  			<div class="col-xl-4">
				  				<h6 class="text-muted"><small>Sertifikat</small> <br> <?php echo $c->sertifikat_apartment ?> <hr> </h6>
				  			</div>
				  			<div class="col-xl-4 text-left">
				  				<h6 class="text-muted"><small>Tahun Dibuat</small> <br> <?php echo date('d/M/Y', strtotime($c->tahundibuat_apartment)) ?><hr> </h6>
				  			</div>
				  			<div class="col-xl-4 text-left">
				  				<h6 class="text-muted"><small>Status</small> <br><span class=" badge badge-warning"><?php echo $c->status_apartment ?></span> <hr></h6>
				  			</div>

				  			<?php if ($c->status_apartment == 'Tersedia'): ?>
					  			<div class="col-xl-12">
					  				<a href="<?php echo base_url('user/sewa/'.$c->id_apartment) ?>" title="" class="btn btn-primary">Sewa</a>
					  			</div>	
				  			<?php else: ?>
				  			<?php endif; ?>

				  		</div>	
				  	<?php endforeach ?>	
				</div>
				
			</div>
		</div>
	</div>
</div>	