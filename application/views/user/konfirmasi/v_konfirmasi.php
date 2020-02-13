<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
					<?php 
					/* Menghilangkan error notice */
	            			ini_set("display_errors",0);
					/* Menghilangkan error notice */
	            			

					 echo form_open_multipart('user/konfirmasi');?>

					<div class="form-group">
						<label for="id_sewa">ID Sewa</label>
							
						<button href="<?php echo base_url('user/konfirmasi/'); ?>" title="" class="badge badge-sm badge-info ">Cek ID</button>
						<input type="text" name="id_sewa" class="form-control w-50" value="<?php echo $content['id_sewa'] ?>">
						<?php echo $this->session->flashdata('pesan_form') ?>
						<?php echo form_error('id_sewa','<small class="text-danger">','</small>'); ?>
					</div>
					<div class="form-group">
						<?php if ($content['payment'] == 'Bayar DP'): ?>
						<label for="payment">Payment</label>
						<select name="payment" class="form-control w-25">
							<option value="<?php echo $content['payment'] ?>"><?php echo $content['payment'] ?></option>
							<option value="Bayar Penuh">Bayar Penuh</option>}
						</select>							
						<?php elseif ( $content['payment'] == 'Bayar Penuh' ): ?>
							<label for="payment">Payment</label>
						<input type="text" name="payment"  class="form-control w-25" value="<?php echo $content['payment'] ?>" readonly>
						<?php else: ?>
						<?php endif; ?>
						<?php echo form_error('payment','<small class="text-danger">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" name="id_penyewa" class="form-control w-50" value="<?php echo $penyewa['id_penyewa'] ?>" hidden>
					</div>
					<div class="form-group">
						<label for="no_rek">No. Rekening</label>
						<input type="text" name="no_rek" class="form-control w-50">
						<?php echo form_error('no_rek','<small class="text-danger">','</small>'); ?>

					</div>
					<div class="form-group">
						<label for="nama_account">Nama Account</label>
						<input type="text" name="nama_account" class="form-control w-50" >
						<?php echo form_error('nama_account','<small class="text-danger">','</small>'); ?>

					</div>
					<div class="form-group">
						<label for="tgl_transfer">Tanggal Transfer</label>
						<input type="date" name="tgl_transfer" class="form-control w-50" >
					</div>
					<div class="form-group">
						<label for="total_bayar">Nominal Pembayaran</label>
						<input type="text" name="total_bayar" class="form-control w-50" placeholder="Contoh : 2000000 tanpa titik">
					</div>
					<div class="form-group">
						<label for="foto">Foto Struk</label>
						<input type="file" name="foto" class="form-control-file">
					</div>	
					<div class="form-group">
						<div>
							<a href="<?php echo base_url('') ?>" title="" class="btn btn-danger">Batal</a> 
							<button class=" text-white btn btn-primary" type="submit" title="">Submit</button>
						</div>	
					</div>	

				</form>
			</div>	
		</div>	
	</div>
</div>	