<body class="bg-dark">
	
<div class="row">
	<div class="col-xl-12">
						<?php echo $this->session->flashdata('pesan')?>
		<div class="p-5">
			<div class="row justify-content-center">
				<div class="col-xl-4">
					<div class="card">
						<div class="card-header bg-light">
							<h5>Login</h5>
						</div>		
						<div class="card-body bg-light">
							<form action="<?php echo base_url('auth'); ?>" method="post" accept-charset="utf-8">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" class="form-control">
									<?php echo form_error('email', '<small class="text-danger">','</small>'); ?>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control">
									<?php echo form_error('password', '<small class="text-danger">','</small>'); ?>

								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-secondary">Login</button>
								</div>
								<hr>
								<div class="form-group text-center">
									<small>Belum punya akun? silahkan, klik </small><a href="<?php echo base_url('register') ?>">Register</a>
									<hr>
									<small><a href="<?php echo base_url('') ?>" title="">Home</a></small>
								</div>
							</form>
						</div>	
					</div>			
				</div>
			</div>	
		</div>
	</div>
</div>	