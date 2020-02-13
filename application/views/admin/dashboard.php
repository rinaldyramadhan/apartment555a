<div class="row">
	<div class="col-xl-12">
		<div class="row">
			<div class="col-xl-6">
				<h6 class="mb-3">Selamat datang <?php echo ucfirst($admin['nama']) ?> </h6>
				<div class="card text-dark"	>
					<div class="card-header">
						<h5>Profile	</h5>
					</div>
					<div class="card-body">
						<div class="card mb-3" style="max-width: 540px;">
						  <div class="row no-gutters">
						    <div class="col-md-4">
						      <img src="<?php echo base_url('assets/image/profil/'.'default.jpg'); ?>" class="card-img" alt="...">
						    </div>
						    <div class="col-md-8">
						      <div class="card-body">
						        <h5 class="card-title"><?php echo ucfirst($admin['nama']); ?></h5>
						        <p class="card-text">
						        	<?php echo ucfirst($admin['email']); ?> <br>
						        	<?php echo ucfirst($admin['role']); ?>

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