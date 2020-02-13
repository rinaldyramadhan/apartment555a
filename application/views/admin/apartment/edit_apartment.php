<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header">
        		<a href="<?php echo base_url('admin/apartment'); ?>" title=""><i class="fas fa-arrow-left"></i> Kembali</a>	
			</div>
			<div class="row justify-content-center">
				
				<div class="card-body">
					<div class="col-xl-12">

						<?php foreach ($content->result() as $c ): ?>
							
						
					<?php echo form_open_multipart('admin/apartment/edit/'.$c->id_apartment);?>
						<div class="form-group row">
							<div class="col-xl-6">
								<label for="nama_apartment">Nama Apartment</label>
								<input type="text" name="nama_apartment" class="form-control" value="<?php echo $c->nama_apartment ?>">
								<?php echo form_error('nama_apartment','<small class="text text-danger">','</small>') ?>
							</div>
							<div class="col-xl-6">
								<label for="luas_apartment">Luas Apartment</label>
								<input type="text" name="luas_apartment" class="form-control" placeholder="Contoh: 100 m2" value="<?php echo $c->luas_apartment ?>">
								<?php echo form_error('luas_apartment','<small class="text text-danger">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-xl-6">
								<label for="alamat_apartment">Alamat Apartment</label>
								<input type="text" name="alamat_apartment" class="form-control" value="<?php echo $c->alamat_apartment ?>">
								<?php echo form_error('alamat_apartment','<small class="text text-danger">','</small>') ?>
							</div>

							<div class="col-xl-6">
								<label for="listrik_apartment">Listrik Apartment</label>
								<input type="text" name="listrik_apartment" class="form-control" value="<?php echo $c->listrik_apartment ?>">
								<?php echo form_error('listrik_apartment','<small class="text text-danger">','</small>') ?>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xl-6">
								<label for="harga_apartment">Harga Apartment</label>
								

								<input type="text" name="harga_apartment" class="form-control" value="<?php echo $c->harga_apartment ?>">
								<?php echo form_error('harga_apartment','<small class="text text-danger">','</small>') ?>
							</div>

							<div class="col-xl-6">
								<label for="sertifikat_apartment">Sertifikat</label>
								<input type="text" name="sertifikat_apartment" class="form-control" value="<?php echo $c->sertifikat_apartment ?>">
								<?php echo form_error('sertifikat_apartment','<small class="text text-danger">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-xl-6">
								<label for="deskripsi_apartment">Deskripsi Apartment</label>
								<textarea name="deskripsi_apartment" rows="5" class="form-control" placeholder="Contoh: Lantai 18, AC, 2 Kamar Tidur, 1 Kamar Mandi, dan lain lain seperti Fasilitas ataupun Fitur yang ada diapartment"><?php echo $c->deskripsi_apartment ?></textarea>
								<?php echo form_error('deskripsi_apartment','<small class="text text-danger">','</small>') ?>
							</div>

							<div class="col-xl-6">
								<label for="tahundibuat_apartment">Tahun Dibuat</label>
								<input type="date" name="tahundibuat_apartment" class="form-control" value="<?php echo $c->tahundibuat_apartment ?>" readonly >
								<?php echo form_error('tahundibuat_apartment','<small class="text text-danger">','</small>') ?>
								<label for="status_apartment" class="mt-3">Status</label>
									<select name="status_apartment"class="form-control">
										<option value="<?php echo $c->status_apartment ?>"><?php echo $c->status_apartment ?></option>v
										<option value="Tersedia">Tersedia</option>
										<option value="Tersewa">Tersewa</option>
									</select>
								<?php echo form_error('status_apartment','<small class="text text-danger">','</small>') ?>
							</div>
						</div>
						<div class="form-group row border pb-3 pt-1 pl-2 pr-2">
							<div class="col-xl-3 mt-3 mb-3">
								<div class="row">
									<div class="col-xl-12">
										<label for="foto1">Foto 1 Apartment</label>
									</div>
									<div class="col-xl-12 mb-3">
										<img src="<?php echo base_url('assets/image/'.$c->foto1); ?>" width="100%" height="135"  alt="foto apartment">
									</div>
									<div class="col-xl-12">
										<input type="file" name="foto1" class="form-control-file">
									</div>
								</div>
							</div>
							<div class="col-xl-3 mt-3 mb-3">
								<div class="row">
									<div class="col-xl-12">
										<label for="foto2">Foto 2 Apartment</label>
									</div>
									<div class="col-xl-12 mb-3">
										<img src="<?php echo base_url('assets/image/'.$c->foto2); ?>" width="100%" height="135"  alt="foto apartment">
									</div>
									<div class="col-xl-12">
										<input type="file" name="foto2" class="form-control-file">
									</div>
								</div>
							</div>
							<div class="col-xl-3 mt-3 mb-3">
								<div class="row">
									<div class="col-xl-12">
										<label for="foto3">Foto 3 Apartment</label>
									</div>
									<div class="col-xl-12 mb-3">
										<img src="<?php echo base_url('assets/image/'.$c->foto3); ?>" width="100%" height="135"  alt="foto apartment">
									</div>
									<div class="col-xl-12">
										<input type="file" name="foto3" class="form-control-file">
									</div>
								</div>
							</div>
							<div class="col-xl-3 mt-3 mb-3">
								<div class="row">
									<div class="col-xl-12">
										<label for="foto4">Foto 4 Apartment</label>
									</div>
									<div class="col-xl-12 mb-3">
										<img src="<?php echo base_url('assets/image/'.$c->foto4); ?>" width="100%" height="135"  alt="foto apartment">
									</div>
									<div class="col-xl-12">
										<input type="file" name="foto4" class="form-control-file">
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
						</div>		
					</form>
						<?php endforeach ?>

				</div>
				
				</div>

			</div>
		</div>	
	</div>		
</div>