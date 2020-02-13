<body class="bg-dark">
	
<div class="row justify-content-center">
	<div class="col-xl-12">
		<div class="p-5">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="card">
						<div class="card-header bg-light">
							<h5>Register</h5>
						</div>
						<div class="card-body bg-light">
							<form action="<?php echo base_url('register'); ?>" method="post" accept-charset="utf-8">
								<div class="form-group">
									<label for="nama">Nama Lengkap</label>
									<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>">
									<?php echo form_error('nama', '<small class="text-danger">','</small>'); ?>
								</div>
								<div class="form-group">
									<label for="no_hp">No. HP / Telp</label>
									<input type="text" name="no_hp" class="form-control" maxlength="15" value="<?php echo set_value('no_hp') ?>">
									<?php echo form_error('no_hp', '<small class="text-danger">','</small>'); ?>
								</div>
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea class="form-control" name="alamat" placeholder="Masukan Alamat" ><?php echo set_value('alamat') ?></textarea>
									<?php echo form_error('alamat', '<small class="text-danger">','</small>'); ?>

								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>">
									<?php echo form_error('email', '<small class="text-danger">','</small>'); ?>
								</div>
								<div class="form-group row">
									<div class="col-xl-6">
										<label for="password">Password</label>
										<input type="password" name="password" class="form-control">
										<?php echo form_error('password', '<small class="text-danger">','</small>'); ?>
									</div>
									<div class="col-xl-6">
										<label for="konfirmasi_password">Konfirmasi Password</label>
										<input type="password" name="konfirmasi_password" class="form-control">
										<?php echo form_error('konfirmasi_password', '<small class="text-danger">','</small>'); ?>
									</div>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-secondary">Register</button>
								</div>
								<hr>
								<div class="form-group text-center">
									<small>Sudah punya akun? silahkan, klik </small><a href="<?php echo base_url('login'); ?>">Login</a>
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