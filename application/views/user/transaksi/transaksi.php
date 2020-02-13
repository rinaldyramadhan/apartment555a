							<?php foreach($content->result_array() as $c) { ?>
							<?php } ?>
<?php if ($this->session->userdata('payment') == 'Bayar DP'): ?>
	

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
									<td>: <?php echo $this->session->userdata('id_sewa') ?></td>
								</tr>
								<tr>
									<td width="">Payment Plan</td>
									<td>: <?php echo $this->session->userdata('payment') ?></td>
								</tr>
								<tr>
									<td width="">Nama</td>
									<td>: <?php echo $penyewa['nama']; ?></td>
								</tr>
								<tr>
									<td width="">No. HP/Telp</td>
									<td>: <?php echo $penyewa['no_hp']; ?></td>
								</tr>
								<tr>
									<td width="">Alamat</td>
									<td>: <?php echo $penyewa['alamat']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>	
				</div>
				<BIG class="text-danger">Batas waktu pembayaran : <?php echo (abs(strtotime($c['tgl_jatuhtempo'])-strtotime(date('Y-m-d')))/(60*60*24))  ?> Hari</BIG>
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
								<th width="">Aksi</th>
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
								

								<td>
									<a class="btn  btn-sm btn-danger" href="<?php echo base_url('user/transaksi/batalById/'.$c['id_apartment']); ?>" title=""><i class="fas fa-trash"></i>Batalkan</a>
								</td>
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

					<div class="mb-2 mt-4">
						<a href="<?php echo base_url('user/transaksi/batal/'.$this->session->userdata('id_sewa')); ?>"  title="" class="btn btn-danger">Batalkan</a>
						<a href="<?php echo base_url('user/transaksi/selesai/'.$this->session->userdata('id_sewa')); ?>" target="_blank" rel="nofollow"  title="" class="btn btn-primary">Selesai</a>
					</div>

				</div>
			</div>	
			<div class="card-footer bg-light text-center">
				
				<h6>Pembayaran Melalui Bank <br>
					BCA : 7991-0002-0007 A/N MOCH ARDIANSYAH <br>
					BNI : 7991-2000-7000 A/N MOCH ARDIANSYAH <br>
					MANDIRI: 7991-0007-0002 A/N MOCH ARDIANSYAH
				</h6>
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
									<td>: <?php echo $this->session->userdata('id_sewa') ?></td>
								</tr>
								<tr>
									<td width="">Payment Plan</td>
									<td>: <?php echo $this->session->userdata('payment') ?></td>
								</tr>
								<tr>
									<td width="">Nama</td>
									<td>: <?php echo $penyewa['nama']; ?></td>
								</tr>
								<tr>
									<td width="">No. HP/Telp</td>
									<td>: <?php echo $penyewa['no_hp']; ?></td>
								</tr>
								<tr>
									<td width="">Alamat</td>
									<td>: <?php echo $penyewa['alamat']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>	
				</div>
				<!-- BATAS WAKTU PEMBAYARAN -->
				<small class="text-info">Batas waktu pembayaran : <?php echo (abs(strtotime($c['tgl_jatuhtempo'])-strtotime(date('Y-m-d')))/(60*60*24))  ?> Hari</small>
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
								<th width="">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($content->result_array() as $c) : ?>
							<tr>
								<td><?php echo $c['nama_apartment'] ?></td>
								<!-- <td><?php /*echo*/ $c['alamat_apartment'] ?></td> -->
								
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

								<!-- manipulasi tanggal -->
								<td><?php echo date('d-M-Y', strtotime($c['tgl_mulai'])) ?></td>
								<td><?php echo date('d-M-Y', strtotime($c['tgl_selesai'])) ?></td>
								<!-- manipulasi harga -->
								<td>Rp. <?php echo number_format($c['total_harga'],0,'.','.') ?></td>
								<td>
									<a class="btn  btn-sm btn-danger" href="<?php echo base_url('user/transaksi/batalById/'.$c['id_apartment']); ?>" title=""><i class="fas fa-trash"></i>Batalkan</a>
								</td>
							</tr>
							<?php endforeach ?>
							<tr>
								<th colspan="4" rowspan="" headers="">Jumlah Total</th>
								<th colspan="" rowspan="" headers="">Rp. <?php echo number_format($total,0,'.','.') ?></th>
							</tr>

						</tbody>
					</table>

					<div class="mb-2 mt-4">
						<a href="<?php echo base_url('user/transaksi/batal/'.$this->session->userdata('id_sewa')); ?>"  title="" class="btn btn-danger">Batalkan</a>
						<a href="<?php echo base_url('user/transaksi/selesai/'.$this->session->userdata('id_sewa')); ?>" target="_blank" rel="nofollow"  title="" class="btn btn-primary">Selesai</a>
					</div>

				</div>
			</div>	
			<div class="card-footer bg-light text-center">
				
				<h6>Pembayaran Melalui Bank <br>
					BCA : 7991-0002-0007 A/N MOCH ARDIANSYAH <br>
					BNI : 7991-2000-7000 A/N MOCH ARDIANSYAH <br>
					MANDIRI: 7991-0007-0002 A/N MOCH ARDIANSYAH
				</h6>
			</div>

			


		</div>	
	</div>	
</div>
<?php endif; ?>