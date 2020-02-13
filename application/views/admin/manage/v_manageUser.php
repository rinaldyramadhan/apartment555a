<div class="row">
	<div class="col-xl-12">
		<?php echo $this->session->flashdata('pesan'); ?>
		<div class="card bg-dark text-white">
			<div class="card-header">
				<div class="row">
					<div class="col-xl-6">
						<h5>Manage User</h5> 
					</div>
					<!-- <div class="col-xl-6 text-right">
						<h5> <a href="" title="" class="text-white btn btn-primary"><i class="fas fa-plus"></i> Tambah</a> </h5>
					</div>	 -->			
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">	
					<table class="table table-sm table-hover text-white text-center" id="dataTable">
						<thead class="text-center">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>No. HP</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($content->result_array() as $c): ?>
								<tr>
									<td><?php 	echo $no++ ?></td>
									<td><?php 	echo ucfirst($c['nama']) ?></td>
									<td><?php 	echo $c['email'] ?></td>
									<td><?php 	echo $c['alamat'] ?></td>
									<td><?php 	echo $c['no_hp'] ?></td>
									<td>
										
										<a href="<?php echo base_url('admin/manage/deleteUser/'.$c['id_penyewa']); ?>" class="badge badge-danger" title=""><i class="fas fa-trash"></i> Delete</a>
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