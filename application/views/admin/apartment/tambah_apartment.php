<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header">
        		<a href="<?php echo base_url('admin/apartment'); ?>" title=""><i class="fas fa-arrow-left"></i> Kembali</a>	
			</div>
			<div class="row justify-content-center">
				
				<div class="card-body">
					<div class="col-xl-12">
						
					<?php echo form_open_multipart('admin/apartment/tambah');?>
						<div class="form-group row">
							<div class="col-xl-6">
								<label for="nama_apartment">Nama Apartment</label>
								<input type="text" name="nama_apartment" class="form-control">
								<?php echo form_error('nama_apartment','<small class="text text-danger">','</small>') ?>
							</div>
							<div class="col-xl-6">
								<label for="luas_apartment">Luas Apartment</label>
								<input type="text" name="luas_apartment" class="form-control" placeholder="Contoh: 100 m2">
								<?php echo form_error('luas_apartment','<small class="text text-danger">','</small>') ?>
							</div>

						</div>
						<div class="form-group row">
							<div class="col-xl-6">
								<label for="alamat_apartment">Alamat Apartment</label>
								<input type="text" name="alamat_apartment" class="form-control">
								<?php echo form_error('alamat_apartment','<small class="text text-danger">','</small>') ?>
							</div>

							<div class="col-xl-6">
								<label for="listrik_apartment">Listrik Apartment</label>
								<input type="text" name="listrik_apartment" class="form-control" placeholder="Contoh: 500watt">
								<?php echo form_error('listrik_apartment','<small class="text text-danger">','</small>') ?>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xl-6">
								<label for="harga_apartment">Harga Apartment</label>
								<input type="text" name="harga_apartment" class="form-control">
								<?php echo form_error('harga_apartment','<small class="text text-danger">','</small>') ?>
							</div>

							<div class="col-xl-6">
								<label for="sertifikat_apartment">Sertifikat</label>
								<input type="text" name="sertifikat_apartment" class="form-control" placeholder="">
								<?php echo form_error('sertifikat_apartment','<small class="text text-danger">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-xl-6">
								<label for="deskripsi_apartment">Deskripsi Apartment</label>
								<textarea name="deskripsi_apartment" rows="3" class="form-control" placeholder="Contoh: Lantai 18, AC, 2 Kamar Tidur, 1 Kamar Mandi, dan lain lain seperti Fasilitas ataupun Fitur yang ada diapartment"></textarea>
								<?php echo form_error('deskripsi_apartment','<small class="text text-danger">','</small>') ?>
							</div>

							<div class="col-xl-6">
								<label for="tahundibuat_apartment">Tahun Dibuat</label>
								<input type="date" name="tahundibuat_apartment" class="form-control" placeholder="">
								<?php echo form_error('tahundibuat_apartment','<small class="text text-danger">','</small>') ?>
							</div>
						</div>
						<div class="form-group row border pb-3 pt-1 pl-2 pr-2">
							<div class="col-xl-3 mt-3 mb-3">
								<div class="row">
									<div class="col-xl-12">
										<label for="foto1">Foto 1 Apartment</label>
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
									<div class="col-xl-12">
										<input type="file" name="foto4" class="form-control-file">
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
						</div>		
					</form>
				</div>
				
				</div>

			</div>
		</div>	
	</div>		
</div>