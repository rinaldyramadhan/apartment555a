<div class="row">
	<div class="col-xl-12">
		<div class="card bg-dark text-white">
			<div class="card-header">
				<div class="row">
					<div class="col-xl-6">
						<h5>Manage Admin</h5> 
					</div>
					<div class="col-xl-6 text-right">
						<h5> <a href="<?php echo base_url('admin/manage/tambahAdmin'); ?>" title="" class="text-white btn btn-primary"><i class="fas fa-plus"></i> Tambah</a> </h5>
					</div>				
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">	
					<table class="table table-sm table-hover text-white text-center" id="dataTable">
						<thead class="text-center">
							<tr>
								<th>ID</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($content->result_array() as $c): ?>
								<tr>
									<td><?php 	echo $c['id_admin'] ?></td>
									<td><?php 	echo ucfirst($c['nama']) ?></td>
									<td><?php 	echo $c['email'] ?></td>
									<td>
										<a href="<?php echo base_url('admin/manage/updateAdmin/'.$c['id_admin']); ?>" class="badge badge-primary" title="">Update</a>
										<a href="<?php echo base_url('admin/manage/deleteAdmin/'.$c['id_admin']); ?>" class="badge badge-danger" title="">Delete</a>
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