<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header">
				<h6>Riwayat Sewa <span class="text-primary"><?php echo $penyewa['nama'] ?></span> </h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-sm table-bordered text-center" id="dataTable">
						<thead>
							<tr>
								<th width="">ID Sewa</th>
								<th width="">Apartment</th>
								<th width="">Alamat</th>
								<th width="">Durasi</th>
								<th width="">Check In</th>
								<th width="">Check Out</th>
								<th width="">DP</th>
								<th width="">Total Harga</th>
								<th width="">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php  foreach ($content->result_array() as $c) : ?>
							<tr>
								<td width=""><?php echo $c['id_sewa'] ?></td>
								<td width=""><?php echo $c['nama_apartment'] ?></td>
								<td width=""><?php echo substr($c['alamat'],0,50) ?>...</td>
								<td width="">
									<?php 
										$durasi = $c['lama_sewa'];
									if ($durasi >= 12): ?>
										1 Tahun
									<?php elseif ($durasi >= 24): ?>
										2 tahun
									<?php else: ?>
										<?php echo $c['lama_sewa'] ?> Bulan
									<?php endif; ?>
								</td>
								<td width=""><?php echo date('d-M-Y',strtotime($c['tgl_mulai'])) ?></td>
								<td width=""><?php echo date('d-M-Y',strtotime($c['tgl_selesai'])) ?></td>
								<td width="">Rp.<?php echo number_format($c['dp'],0,'.','.') ?></td>

								<td width="">Rp.<?php echo number_format($c['total_harga'],0,'.','.') ?></td>
								<td width=""><a href="<?php echo base_url('user/riwayatsewa/invoice/'.$c['id_sewa']); ?>" title=""><i class="fas fa-eye"></i></a></td>

							</tr>

							<?php endforeach ?>
							<tr>
								<td colspan="6">Total Biaya yang harus dibayar</td>
								<td colspan="">Rp.<?php echo number_format($totalDP,0,'.','.') ?></td>
								<td colspan="">Rp.<?php echo number_format($total,0,'.','.') ?></td>
							</tr>
						</tbody>
					</table>
				</div>	
			</div>
		</div>
	</div>
</div>