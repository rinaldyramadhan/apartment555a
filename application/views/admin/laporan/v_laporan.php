

<div class="row">
	<div class="col-xl-12">
		<div class="card bg-white">
			<div class="card-header">
				<div class="row">
					<div class="col-xl-2">
						<h5 class="mt-3">Laporan</h5> 
					</div>
					<div class="col-xl-10 text-right">
						<form action="<?php echo base_url('admin/laporan/tampil'); ?>" method="post" accept-charset="utf-8">
							<div class="form-group">
								<div class="row">
									<div class="col-xl-2 mt-3">
										<select name="bulan" class="form-control">
											<option value="">Bulan</option>
											<option value="01">Januari</option>
											<option value="02">Februari</option>
											<option value="03">Maret</option>
											<option value="04">April</option>
											<option value="05">Mei</option>
											<option value="06">Juni</option>
											<option value="07">Juli</option>
											<option value="08">Agustus</option>
											<option value="09">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
									</div>
									
									<div class="col-xl-2 mt-3">
										<select name="tahun" class="form-control">
											<option value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
										</select>
									</div>
									<div class="col-xl-2 mt-3">
										<button  class="form-control btn btn-primary text-white" href="<?php echo base_url('admin/laporan/tampil'); ?>"><i class="fas fa-eye"></i> Lihat</button>
										
									</div>		
								</div>	
							</div>
						</form>	
					</div>				
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">	
					<table class="table table-sm table-bordered text-dark text-center" id="dataTable">
							<thead>
								<tr>
									<th>ID Sewa</th>
									<th >Penyewa</th>
									<th >Apartment</th>
									<th >Lama Sewa</th>
									<th >Check In</th>
									<th >Check Out</th>
									<th >Total Bayarr</th>
									<th >Sisa Pembayaran</th>
									<th >Status</th>
									<th>Total Harga</th>
								</tr>
							</thead>
							<tbody>
						<?php foreach ($content->result_array() as $c): ?>

								<tr>
									<td width=""><?php echo $c['id_sewa'] ?>c</td>
									<td width=""><?php echo $c['nama_penyewa'] ?></td>
									<td width=""><?php echo $c['nama_apartment'] ?></td>
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
									<td width="">
										<?php $sisa_pembayaran = number_format($c['total_bayar'],0,'.','.');
										if ($sisa_pembayaran == 0): ?>
											<?php 	echo "-" ?>
										<?php else: ?>
											<?php echo 	"Rp.".$sisa_pembayaran ?>
										<?php endif; ?>
										
											
									</td>
									<td width="">
										<?php 
											$sisa_pembayaran =  $c['jumlah_total']-$c['total_bayar'];
											if ($sisa_pembayaran == 0): ?>
											<?php echo '-' ?>					

										<?php else: ?>
											Rp.<?php echo number_format($sisa_pembayaran,0,'.','.') ?>
										<?php endif; ?>
										
									</td>
									<td width=""><?php echo $c['status_sewa'] ?></td>
									<td width="">
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
									<td width="100">Rp. <?php echo number_format($jumlahTotalHarga,0,'.','.') ?></td>
									
								</tr>
							</tbody>
					</table>
				</div>	
			</div>
		</div>
	</div>
</div>		


