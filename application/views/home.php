<div class="row justify-content-center">

	<div class="col-xl-8">
		<?php echo $this->session->flashdata('pesan'); ?>
		<div class="card p-4 text-dark">
			
		<div class="table-responsive">
	        <table class="table table-hover" width="100%" id="dataTable">
	            <thead>
		            <tr>
		            	<th>
		            		<h5><?php echo SITE_NAME ?></h5>
		            	</th>
		            </tr>
	            </thead>
	            <tbody>
	            	<?php foreach ($content->result() as $c) : ?>
	            		

	            		<!-- TIMER SEWA -->
	            		<?php 

	            			/* Menghilangkan error notice */
	            			ini_set("display_errors",0);
	            			/* Menghilangkan error notice */
	            			
	            			date_default_timezone_set('Asia/Jakarta');
	            			$tgl_skrg = date('Y-m-d');

	            			$id = $c->id_apartment;

	            			$tgl = $this->db->get_where('detail_sewa',['id_apartment'=>$id])->row_array();

	            			$tgl_selesai = $tgl['tgl_selesai']; 

	            			$durasiSewa = (abs(strtotime($tgl_selesai)-strtotime($tgl_skrg))/(60*60*24)) ;

	            			/*$durasiJatuhTempo = (abs(strtotime($s['tgl_jatuhtempo'])-strtotime($datenow))/(60*60*24)) ;*/
	            			
	            			if ($durasiSewa == 0) {
	            				$data = [
				 					'status_apartment'	=>	'Tersedia'
				 				];
				 				$this->db->where('id_apartment',$id);
				 				$this->db->update('tb_apartment',$data);
	            			} else {
	            			}
	            		?>
	            		<!-- AKHIR TIMER SEWA -->


	              <tr>
	                <td>
	                	<div class="card mb-3" >
							  <div class="row no-gutters">
							    <div class="col-md-7">
							      <img src="<?php echo base_url('assets/image/'.$c->foto1) ?>" class="card-img"  width="100%" height="200" alt="Foto Aparment555">
							    </div>
							    <div class="col-md-5">
							      <div class="card-body">
					            	<h5 class="card-title"><?php echo $c->nama_apartment ?></h5>
							        <p class="card-text">
							        	<?php echo $c->alamat_apartment ?><br>
							        	<small class="badge badge-info">Rp. <?php echo number_format($c->harga_apartment,0,'.','.') ?>/Bulan</small> <small class="badge badge-warning"><?php echo $c->status_apartment ?></small>
							        </p>
							        <a class="btn btn-sm btn-primary text-white" href="<?php echo base_url('home/detail/'.$c->id_apartment) ;?>">Lihat</a>
							      </div>
							    </div>
							  </div>
							</div>
	            	</td>
	              </tr>
	            	<?php endforeach ?>
	            </tbody>
	        </table>
	    </div>

		</div>
	</div> <!-- end col -->

</div>	

<?php $this->load->view('templates/footer'); ?>