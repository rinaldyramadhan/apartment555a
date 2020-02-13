<div class="row">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<?php foreach ($content->result() as $c ) :?>
				<h5 class="text-muted"><a class="badge badge-secondary" href="<?php echo base_url('home/detail/'.$c->id_apartment); ?>" title=""><i class="fas fa-arrow-left"> Kembali</i></a> <div class="text-center">Form Sewa</div></h5>
				<?php endforeach ?>
			</div>
			<div class="card-body">
				<?php foreach ($content->result() as $c ) :?>
					<form action="<?php echo base_url('user/sewa/'.$c->id_apartment); ?>" method="post" accept-charset="utf-8">
						
						<!-- HIDDEN INPUT UNTUK KETERANGAN USER DIMASUKAN KE DALAM TABEL SEWA -->
						<input type="text" name="id_penyewa" class="form-control" value="<?php echo $penyewa['id_penyewa'] ?>" hidden>
						<input type="text" name="nama_penyewa" class="form-control" value="<?php echo $penyewa['nama'] ?>" hidden>
						<input type="text" name="no_hp" class="form-control" value="<?php echo $penyewa['no_hp'] ?>" hidden>
						<input type="text" name="alamat" class="form-control" value="<?php echo $penyewa['alamat'] ?>" hidden>

						<input type="text" name="id_apartment" class="form-control" value="<?php echo $c->id_apartment ?>" hidden>

						
						<div class="form-group row">
							<div class="col-xl-6">
								<div id="carouselExampleSlidesOnly" class="carousel slide mb-3" data-ride="carousel" >
								  <div class="carousel-inner">
								    <div class="carousel-item active">
								        <img src="<?php echo base_url('assets/image/'.$c->foto1) ?>" alt="foto apartment" width="100%" height="400" alt="...">
								    </div>
								    <div class="carousel-item">
								      <img src="<?php echo base_url('assets/image/'.$c->foto2) ?>" alt="foto apartment" width="100%" height="400" alt="...">
								    </div>
								    <div class="carousel-item">
								      <img src="<?php echo base_url('assets/image/'.$c->foto3) ?>" alt="foto apartment" width="100%" height="400" alt="...">
								    </div>
								    <div class="carousel-item">
								      <img src="<?php echo base_url('assets/image/'.$c->foto4) ?>" alt="foto apartment" width="100%" height="400" alt="...">
								    </div>
								  </div>
								</div>
							</div>
							<div class="col-xl-6">
						  		<div class="row">
						  			<!--  APARTMENT -->
						  			<div class="col-xl-12">
						  				<h3><?php echo $c->nama_apartment ?></h3>
										<input type="text" name="nama_apartment" class="form-control" value="<?php echo $c->nama_apartment ?>" hidden>

						  			</div>
						  			
						  			<div class="col-xl-6">
						  				<h4 class="text-primary"><small>Rp.</small> <?php echo number_format($c->harga_apartment,0,'.','.') ?>/Bulan</h4>
										<input type="text" name="harga_apartment" class="form-control" value="<?php echo $c->harga_apartment ?>" hidden>

						  			</div>

						  			<div class="col-xl-6">
						  				<h6><small><b>DP--> </b></small><span class=" badge badge-warning">5% dari total harga</span></h6>
						  			</div>	
						  			<div class="col-xl-12">
						  				<h5><?php echo $c->alamat_apartment ?></h5>
						  				<input type="text" name="alamat_apartment" class="form-control" value="<?php echo $c->alamat_apartment ?>" hidden>
						  			</div>

						  			<div class="col-xl-3">
							  				<h6 for="lama_sewa"><small><b>Lama Sewa</b></small></h6>
							  				<select name="lama_sewa" class="form-control">
							  					<option value="1"> 1 Bulan</option>
							  					<option value="2"> 2 Bulan</option>
							  					<option value="3"> 3 Bulan</option>
							  					<option value="4"> 4 Bulan</option>
							  					<option value="5"> 5 Bulan</option>
							  					<option value="6"> 6 Bulan</option>
							  					<option value="7"> 7 Bulan</option>
							  					<option value="8"> 8 Bulan</option>
							  					<option value="9"> 9 Bulan</option>
							  					<option value="10"> 10 Bulan</option>
							  					<option value="11"> 11 Bulan</option>
							  					<option value="12"> 12 Bulan</option>
							  				</select>
						  			</div>

						  			<div class="col-xl-5">
							  				<h6 for="tgl_mulai"><small><b>Check In</b></small></h6>
							  				<input type="date" name="tgl_mulai" class="form-control">
							  				<?php echo form_error('tgl_mulai','<small class="text-danger">','</small>'); ?>
							  		</div>
							  		<div class="col-xl-4">
							  				<h6 for="payment"><small><b>Payment Plan</b></small></h6>
							  				<?php if ($this->session->userdata('payment')): ?>
							  				<select name="payment" class="form-control">
							  					<option value="<?php echo $this->session->userdata('payment') ?>"><?php echo $this->session->userdata('payment') ?></option>
							  				</select>

							  				<?php else: ?>							  				
							  				<select name="payment" class="form-control">
							  					<option value="Bayar Penuh">Bayar Penuh</option>
							  					<option value="Bayar DP">Bayar DP</option>

							  				</select>
							  				<?php endif; ?>
							  		</div>			
						  			<div class="col-xl-12">
						  				<hr>
						  				
						  			</div>


						  			<!-- DESKRIPSI -->
						  			<div class="col-xl-12">
						  				<h6>Deskripsi</h6>
						  				<h6><?php echo $c->deskripsi_apartment ?> <br> <br>
						  					<small class="card bg-info p-2 text-white">
												Info: Biaya Listrik, Air, Kebersihan, dan Parkir di tanggung Penyewa.
											</small>
						  				</h6>
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
						  				<h6 class="text-muted"><small>Tahun Dibuat</small> <br> <?php echo date('d/M/Y', strtotime($c->tahundibuat_apartment)) ?> <hr> </h6>
						  			</div>
						  			
						  			<div class="col-xl-12">
						  				<button type="submit" class="btn btn-primary">Lanjutkan Pembayaran</button>
						  			</div>	

						  		</div>	
						</div>
						
					</form>
				<?php endforeach ?>
			</div>
		</div>	
	</div>
</div>	