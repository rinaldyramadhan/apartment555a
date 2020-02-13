<div class="row text-white">
	<div class="col-xl-12">
		<div class="row">
			<div class="col-xl-6">
					

					<?php echo form_open_multipart('user/dashboard/setting/'.$penyewa['id_penyewa']);?>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $penyewa['email'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" name="nama" class="form-control" value="<?php echo $penyewa['nama'] ?>">
						<?php echo form_error('nama', '<small class="text-danger">','</small>'); ?>
					</div>
					<div class="form-group">
						<label for="no_hp">No. HP / Telp</label>
						<input type="text" name="no_hp" class="form-control" maxlength="15" value="<?php echo $penyewa['no_hp'] ?>">
						<?php echo form_error('no_hp', '<small class="text-danger">','</small>'); ?>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea class="form-control" name="alamat" placeholder="Masukan Alamat" ><?php echo $penyewa['alamat'] ?></textarea>
						<?php echo form_error('alamat', '<small class="text-danger">','</small>'); ?>
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
					<div class="form-group row">
						<div class="col-xl-4">
							<img src="<?php echo base_url('assets/image/profil/'.$penyewa['foto_profil']); ?>" alt="foto profil" width="150">
						</div>
						<div class="col-xl-6 mt-3">
							<label for="foto_profil">Foto</label>
							<input type="file" name="foto_profil" class="form-control-file">
						</div>
						
					</div>
					<button type="submit" title="" class="btn btn-primary">Update</button>
				</form>	


			</div>
		</div>
	</div>	
</div>	