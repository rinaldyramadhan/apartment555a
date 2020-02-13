<div class="row">
	<div class="col-xl-12">
		<div class="row">
			<div class="col-xl-6">
				<h6 class="mb-3 text-white">Selamat datang <?php echo ucfirst($penyewa['nama']) ?> </h6>
				<div class="card bg-info">
					<div class="card-header bg-info">
						<h5>Profile	</h5>
					</div>
					<div class="card-body bg-info">
						<div class="card mb-3 bg-info" style="max-width: 540px;">
						  <div class="row no-gutters">
						    <div class="col-md-4">
						      <img src="<?php echo base_url('assets/image/profil/'.($penyewa['foto_profil']) ); ?>" class="card-img" alt="...">
						    </div>
						    <div class="col-md-8">
						      <div class="card-body bg-info">
						        <h5 class="card-title"><?php echo ucfirst($penyewa['nama']); ?></h5>
						        <p class="card-text">
						        	<?php echo ucfirst($penyewa['email']); ?><br>
						        	<?php echo ucfirst($penyewa['role']); ?><br>
						        	<?php echo ucfirst($penyewa['alamat']); ?><br>
						        </p>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
				</div>	
			</div>
		</div>					
	</div>
</div>