<div class="row text-dark">
	<div class="col-xl-12">
		<div class="row">
			<div class="col-xl-6">
					
				<form action="<?php echo base_url('admin/manage/tambahAdmin/'); ?>" method="post" accept-charset="utf-8">
					<div class="form-group">
						<h5 for="nama">Nama</h5>
						<input type="text" name="nama" value="<?php echo set_value('nama') ?>" class="form-control">
						<?php echo form_error('nama','<small class="text-info">','</small>') ?>
					</div>
					<div class="form-group">
						<h5 for="email">Email</h5>
						<input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>">
					</div>	
					<div class="form-group">
						<h5 for="role">Role</h5>
						<select name="role" class="form-control">
							<option value="Admin">Admin</option>
							<option value="Penyewa">Penyewa</option>
						</select>
					</div>
					<div class="form-group">
						<h5 for="password">Password</h5>
						<input type="password" name="password" class="form-control">
					</div>
					
					<button type="submit" title="" class="btn btn-primary">Simpan</button>
				</form>	


			</div>
		</div>
	</div>	
</div>	