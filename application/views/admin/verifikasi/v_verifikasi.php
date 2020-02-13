<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header">
				<h5> Verifikasi Pembayaran</h5>
			</div>	
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover text-center" id="dataTable">
						<thead>
							<tr>
								<th>ID Sewa</th>
								<th>Penyewa</th>
								<th>Status</th>
								<th>Foto Struk</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($content->result_array() as $c) : ?>
							<tr>
								<td width=""><?php echo $c['id_sewa'] ?></td>
								<td width=""><?php echo $c['nama_penyewa'] ?></td>
								<td width=""><?php echo $c['status_konfirmasi'] ?></td>
								<td width="">
									<a href="<?php echo base_url('assets/image/konfirmasi/'.$c['foto']); ?>" target="_blank" rel="nofollow" title="">
										<img src="<?php echo base_url('assets/image/konfirmasi/'.$c['foto']); ?>" alt="" width="50" height="50">
									</a>
								</td>
								<td width="">
									<a href="<?php echo base_url('admin/verifikasi/detail/'.$c['id_sewa']); ?>" title="" class="badge badge-secondary"><i class="fas fa-eye"></i> Detail</a>
									<a href="<?php echo base_url('admin/verifikasi/update/'.$c['id_konfirmasi']); ?>/<?php echo $c['id_sewa']  ?>" title="" class="badge badge-primary">Update</a>
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