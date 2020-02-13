<?php $this->load->view('templates/head'); ?>
<div class="row">
	<div class="col-xl-12">
		<div class="row justify-content-center">
			<div class="col-xl-12">
				<div class="card bg-light">
					<div class="card-header">
						<div class="row">
							<div class="col-xl-8">
								<H5>Laporan Transaksi Apartment555</H5>
							</div>
							
						</div>	
					</div>
					<div class="card-body">
							<div class="table-responsive">
								<table class="table table-sm table-hover text-white text-center text-dark" id="dataTable">
									<thead>
										<tr>
											<th  >ID Sewa</th>
											<th  >Penyewa</th>
											<th  >Apartment</th>
											<th  >Lama </th>
											<th  >Check In</th>
											<th  >Check Out</th>
											<th  >Total Bayar</th>
											<th  >Sisa Pembayaran</th>
											<th  >Status</th>
											<th  >Harga</th>
										</tr>
									</thead>
									<tbody>
								<?php foreach ($content->result_array() as $c): ?>

										
								<tr>
									<td ><?php echo $c['id_sewa'] ?>c</td>
									<td ><?php echo $c['nama_penyewa'] ?></td>
									<td ><?php echo $c['nama_apartment'] ?></td>
									<td >
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
									<td ><?php echo date('d/M/Y',strtotime($c['tgl_mulai'])) ?></td>
									<td ><?php echo date('d/M/Y',strtotime($c['tgl_selesai'])) ?></td>
									<td >
										<?php $sisa_pembayaran = number_format($c['total_bayar'],0,'.','.');
										if ($sisa_pembayaran == 0): ?>
											<?php 	echo "-" ?>
										<?php else: ?>
											<?php echo 	"Rp.".$sisa_pembayaran ?>
										<?php endif; ?>
									</td>
									<td >
										<?php 
											$sisa_pembayaran =  $c['jumlah_total']-$c['total_bayar'];
											if ($sisa_pembayaran == 0): ?>
											<?php echo '-' ?>					

										<?php else: ?>
											Rp.<?php echo number_format($sisa_pembayaran,0,'.','.') ?>
										<?php endif; ?>
										
									</td>
									<td ><?php echo $c['status_sewa'] ?></td>
									<td >
										<?php 
											if ($c['status_sewa'] == 'Dibatalkan'): ?>
											<?php echo '-' ?>					

										<?php else: ?>
											Rp.<?php echo number_format($c['total_harga'],0,'.','.') ?>
										<?php endif; ?>
									</td>
									
								</tr>

								<?php endforeach ?>
										<tr>
											<td  colspan="9">Jumlah Total Harga</td>
											<td width="500">Rp. <?php echo number_format($jumlahTotalHarga,0,'.','.') ?></td>
											
										</tr>
									</tbody>
							</table>
								<small class="text-primary"> Di cetak pada tanggal <?php 	echo date('d M Y'); ?></small>
							</div>	
					</div>		
				</div>	
				
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('templates/modal'); ?>
<script type="text/javascript">
	window.print();
</script>
<?php $this->load->view('templates/js'); ?>






