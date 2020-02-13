<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">

				<form action="<?php echo base_url('admin/verifikasi/proses_update/'.$content['id_konfirmasi']); ?>/<?php 	echo $content['id_sewa'] ?>/<?php 	echo $content['id_apartment'] ?>" method="post" accept-charset="utf-8">

						
					<div class="form-group">
						<label for="id_sewa">ID Sewa</label>
						<input type="text" name="id_sewa" class="form-control" value="<?php echo $content['id_sewa'] ?>" readonly>
						<input type="text" name="id_konfirmasi" class="form-control" value="<?php echo $content['id_konfirmasi'] ?>" hidden>
						<input type="text" name="id_admin" class="form-control" value="<?php echo $admin['id_admin'] ?>" hidden>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xl-6">
								<label for="status">Status</label>
								<select name="status_konfirmasi" class="form-control">
									<option><?php echo $content['status_konfirmasi'] ?></option>
									<option	>Menunggu Pembayaran Lunas</option>
									<option	>Lunas</option>
								</select>
							</div>
							<div class="col-xl-6">
								<label for="status">Payment</label>
								<select name="payment" class="form-control">
									<option><?php echo $content['payment'] ?></option>
									<option	>Bayar Penuh</option>
								</select>										
							</div>
						</div>
								

					</div>
					<div class="form-group row">
						<div class="col-xl-6">
						<label for="total_bayar">Nominal Pembayaran</label>
						<input type="text" name="" class="form-control" value="Rp. <?php echo number_format($content['nominal_bayar'],0,'.','.') ?>" readonly>
						<input type="text" name="nominal_bayar" class="form-control" value="<?php echo $content['nominal_bayar']+$content['total_bayar'] ?>" hidden>
						</div>
						<div class="col-xl-6">
						<label for="">Tagihan Pembayaran <small>ID Sewa <?php echo $content['id_sewa'] ?> </small></label> <br>
						<div class="row">
							<?php if ($tagihan['total_bayar'] == true): ?>
								<div class="col-5">
									<input type="text" name="" class="form-control" value="Sisa: Rp. <?php echo number_format($tagihan['jumlah_total']-$tagihan['total_bayar'],0,'.','.') ?>" readonly>
								</div>
								
							<?php else: ?>
								<div class="col-5">
									<input type="text" name="" class="form-control" value="Sisa: Rp. <?php echo number_format($tagihan['jumlah_total'],0,'.','.') ?>" readonly>
								</div>
							<?php endif ?>
						</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Update</button>
				</form>
			</div>	
		</div>	
	</div>		
</div>	