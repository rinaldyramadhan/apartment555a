<div class="row text-white">
	<div class="col-xl-12">
		<div class="row">
			<div class="col-xl-6">
				<?php foreach ($content->result_array() as $c): ?>
					
				<form action="<?php echo base_url('admin/manage/updateAdmin/'.$c['id_admin']); ?>" method="post" accept-charset="utf-8">
					<div class="form-group">
						<h5 for="nama">Nama</h5>
						<input type="text" name="nama" value="<?php echo $c['nama']; ?>" class="form-control">
						<?php echo form_error('nama','<small class="text-info">','</small>') ?>
					</div>
					<div class="form-group">
						<h5 for="email">Email</h5>
						<input type="email" name="email" class="form-control" value="<?php echo $c['email']; ?>">
					</div>	
					<div class="form-group">
						<h5 for="role">Role</h5>
						<select name="role" class="form-control">
							<option value="<?php echo $c['role']; ?>"><?php echo $c['role']; ?></option>
							<option value="Admin">Admin</option>
							<option value="Penyewa">Penyewa</option>
						</select>
					</div>
					
					<button type="submit" title="" class="btn btn-primary">Update</button>
				</form>	

				<?php endforeach ?>

			</div>
		</div>
	</div>	
</div>	