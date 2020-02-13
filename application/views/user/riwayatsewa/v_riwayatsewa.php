<div class="row">
	<div class="col-xl-12">
		<?php echo $this->session->flashdata('pesan')?>
		<div class="card">
			<div class="card-header">
				<h6>Riwayat Sewa <span class="text-primary"><?php echo $penyewa['nama'] ?></span> </h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-sm table-bordered text-center" id="dataTable">
						<thead>
							<tr>
								<th>ID Sewa</th>
								<th>Payment</th>
								<th width="200">Batas Waktu Pembayaran</th>
								<th width="100">Total Bayar</th>
								<th>Sisa Pembayaran</th>
								<th>Status</th>
								<th width="100">Harga</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php  foreach ($content->result_array() as $c) : ?>
							<tr>
								<td width=""><?php echo $c['id_sewa'] ?></td>
								<td width=""><?php echo $c['payment'] ?></td>
								<td width="">
										<?php $batas_waktu = (abs(strtotime($c['tgl_jatuhtempo'])-strtotime(date('Y-m-d')))/(60*60*24));
											if ($batas_waktu == 0): ?>

											<?php if ($c['status_sewa'] == 'Lunas'): ?>

												<?php echo "-" ?>
												<!-- tidak melakukan apa2 -->

											<?php else: ?>

											<?php echo 'Karena tidak melunasi pembayaran sewa dibatalkan' ?>
											<?php endif; ?>



										<?php else: ?>
											<?php echo (abs(strtotime($c['tgl_jatuhtempo'])-strtotime(date('Y-m-d')))/(60*60*24))  ?> Hari lagi
										<?php endif; ?>
								 
								</td>
								<td width="">Rp. <?php echo number_format($c['total_bayar'],0,'.','.') ?></td>
								<td width="">
												<?php 
													$sisa_pembayaran =  $c['jumlah_total']-$c['total_bayar'];
													if ($sisa_pembayaran == 0): ?>
													<?php echo 'Tidak ada' ?>					

												<?php else: ?>
													Rp. <?php echo number_format($sisa_pembayaran,0,'.','.') ?>
												<?php endif; ?>
								</td>
								<td width=""><?php echo $c['status_sewa'] ?></td>
								<td width="">Rp. <?php echo number_format($c['jumlah_total'],0,'.','.') ?></td>
								<td	>
									<a href="<?php echo base_url('user/riwayatsewa/detail/'.$c['id_sewa']); ?>" title=""><i class="fas fa-eye"></i></a> 
								</td>
							</tr>
							
							<?php endforeach ?>
						</tbody>
					</table>
				</div>	
				
			</div>
		</div>
	</div>
</div>