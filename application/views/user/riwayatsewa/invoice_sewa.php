<?php if ( $invoice['payment'] == 'Bayar DP'): ?>
	
<div class="row">	
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header bg-light">
				<h5 class="text-center">Invoice Bayar DP</h5>
			</div>	
			<div class="card-body bg-light">
				<div class="container">
					<div class="row">
						<table class="mb-3">
							<tbody>

								<tr>
									<td width="">ID Sewa</td>
									<td>: <?php echo $invoice['id_sewa'] ?></td>
								</tr>
								<tr>
									<td width="">Payment Plan</td>
									<td>: <?php echo $invoice['payment'] ?></td>
									
								</tr>
								<tr>
									<td width="">Nama</td>
									<td>: <?php echo $invoice['nama_penyewa'] ?></td>
									
								</tr>
								<tr>
									<td width="">No. HP/Telp</td>
									<td>: <?php echo $invoice['no_hp'] ?></td>
									
								</tr>
								<tr>
									<td width="">Alamat</td>
									<td>: <?php echo $invoice['alamat'] ?></td>
									
								</tr>

							</tbody>
						</table>
					</div>	
				</div>
				<div class="table-responsive">
					<table class="table table-bordered text-center justify-items-center"  width="100%">
						<thead>
							<tr>
								<th width="">Nama Apartment</th>
								<!-- <th  width="">Alamat</th> -->
								<th  width="">Lama Sewa</th>
								<th  width="">Tanggal Check In</th>
								<th width="">Tanggal Check Out</th>
								<th width="">Harga</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($content->result_array() as $c) : ?>
							<tr>
								<td><?php echo $c['nama_apartment'] ?></td>
								<!-- <td><?php /*echo*/ $c['alamat_apartment'] ?></td> -->
								<td><?php echo $c['lama_sewa'] ?> Bulan</td>
								<!-- manipulasi tanggal -->
								<td><?php echo date('d-M-Y', strtotime($c['tgl_mulai'])) ?></td>
								<td><?php echo date('d-M-Y', strtotime($c['tgl_selesai'])) ?></td>
								<!-- manipulasi harga -->
								<td>Rp. <?php echo number_format($c['dp'],0,'.','.') ?></td>
								
							</tr>
							<?php endforeach ?>
								<tr>
								<th colspan="4" rowspan="" headers="">Jumlah Total DP</th>
								<th colspan="" rowspan="" headers="">Rp. <?php echo number_format($totalDP,0,'.','.') ?></th>
							</tr>
							<tr>
								<th colspan="4" rowspan="" headers="">Jumlah Total Sisa Yang Harus Di Bayar</th>
								<th colspan="" rowspan="" headers="">Rp. <?php echo number_format($total-$totalDP,0,'.','.') ?></th>
							</tr>

						</tbody>
					</table>

					
				<a href="<?php echo base_url('user/riwayatsewa/cetak'.$c['id_sewa']) ?>" title="">Cetak</a>

				</div>
			</div>	
			

			


		</div>	
	</div>	
</div>		
<?php else: ?>
	<div class="row">	
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header bg-light">
				<h5 class="text-center">Invoice Bayar Penuh</h5>
			</div>	
			<div class="card-body bg-light">
				<div class="container">
					<div class="row">
						<table class="mb-3">
							<tbody>

								<tr>
									<td width="">ID Sewa</td>
									<td>: <?php echo $invoice['id_sewa'] ?></td>
								</tr>
								<tr>
									<td width="">Payment Plan</td>
									<td>: <?php echo $invoice['payment'] ?></td>
									
								</tr>
								<tr>
									<td width="">Nama</td>
									<td>: <?php echo $invoice['nama_penyewa'] ?></td>
									
								</tr>
								<tr>
									<td width="">No. HP/Telp</td>
									<td>: <?php echo $invoice['no_hp'] ?></td>
									
								</tr>
								<tr>
									<td width="">Alamat</td>
									<td>: <?php echo $invoice['alamat'] ?></td>
									
								</tr>
							</tbody>
						</table>
					</div>	
				</div>
				<div class="table-responsive">
					<table class="table table-bordered text-center justify-items-center"  width="100%">
						<thead>
							<tr>
								<th width="">Nama Apartment</th>
								<!-- <th  width="">Alamat</th> -->
								<th  width="">Lama Sewa</th>
								<th  width="">Tanggal Check In</th>
								<th width="">Tanggal Check Out</th>
								<th width="">Harga</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($content->result_array() as $c) : ?>
							<tr>
								<td><?php echo $c['nama_apartment'] ?></td>
								<!-- <td><?php /*echo*/ $c['alamat_apartment'] ?></td> -->
								<td><?php echo $c['lama_sewa'] ?> Bulan</td>
								<!-- manipulasi tanggal -->
								<td><?php echo date('d-M-Y', strtotime($c['tgl_mulai'])) ?></td>
								<td><?php echo date('d-M-Y', strtotime($c['tgl_selesai'])) ?></td>
								<!-- manipulasi harga -->
								<td>Rp. <?php echo number_format($c['total_harga'],0,'.','.') ?></td>
								
							</tr>
							<?php endforeach ?>
							<tr>
								<th colspan="4" rowspan="" headers="">Jumlah Total</th>
								<th colspan="" rowspan="" headers="">Rp. <?php echo number_format($total,0,'.','.') ?></th>
							</tr>

						</tbody>
					</table>

					
				<a href="<?php echo base_url('user/riwayatsewa/cetak/'.$c['id_sewa']) ?>" class="btn btn-primary" title="">Cetak</a>

				</div>
			</div>	
			
		</div>	
	</div>	
</div>
<?php endif; ?>