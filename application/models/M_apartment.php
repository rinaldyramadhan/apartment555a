<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_apartment extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		$config['upload_path'] = './assets/uploads/gambar/';
		$config['allowed_types'] = 'gif|png|jpg|pdf';
		$config['max_size'] = 0;
		$this->load->library('upload',$config);

	}

	public function rules(){

		$this->form_validation->set_rules('nama_apartment','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Nama Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('alamat_apartment','Alamat Apartment', 'required|trim',[

			'required'	=>	'Perhatian Alamat Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('harga_apartment','Harga Apartment', 'required|trim',[

			'required'	=>	'Perhatian Harga Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('deskripsi_apartment','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Deskripsi Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('deskripsi_apartment','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Deskripsi Apartment Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('deskripsi_apartment','Nama Apartment', 'required|trim',[

			'required'	=>	'Perhatian Deskripsi Apartment Tidak Boleh Kosong'
		]);


	}

	public function get()
	{
		return $this->db->get('tb_apartment');
	}

	public function getJoin()
	{
		$this->db->select('*');
		$this->db->from('tb_apartment');
		$this->db->join('tb_detail_apartment','tb_detail_apartment.id_detail_apartment=tb_apartment.id_apartment');
		return $this->db->get();
	}

	public function getJoinById($id)
	{
		$this->db->select('*');
		$this->db->from('tb_apartment');
		$this->db->join('tb_detail_apartment','tb_detail_apartment.id_detail_apartment=tb_apartment.id_apartment');
		/*return $this->db->get_where('tb_apartment',['tb_detail_apartment.id_detail_apartment'=>$id]);*/
		$this->db->where('tb_detail_apartment.id_detail_apartment',$id);
		return $this->db->get();

	}

	public function getById($id)
	{
		return $this->db->get_where('tb_apartment',['id_apartment'=>$id]);
	}

	public function save()
	{	

		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|png|jpg|pdf';
		$config['max_size'] = 0;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if (! $this->upload->do_upload('foto1')) {
					
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					Gagal mengupload foto 1! silahkan cek file upload!
				</div>');

				redirect('admin/apartment');

				}	else {

					$upload_foto1	=	$this->upload->data('');

					if (! $this->upload->do_upload('foto2')) {
						
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
							Gagal mengupload foto 2! silahkan cek file upload!
						</div>');

						redirect('admin/apartment');

					} else {
						$upload_foto2	=	$this->upload->data('');

						if (! $this->upload->do_upload('foto3')) {
							
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
								Gagal mengupload foto 3! silahkan cek file upload!
							</div>');

							redirect('admin/apartment');

						} else {

							$upload_foto3	=	$this->upload->data('');

							if (! $this->upload->do_upload('foto4')) {
								
								$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
									Gagal mengupload foto 4! silahkan cek file upload!
								</div>');

								redirect('admin/apartment');

							} else {

								$upload_foto4	=	$this->upload->data('');

								$data1 = [
									'nama_apartment'	=>	$this->input->post('nama_apartment'),
									'alamat_apartment'	=>	$this->input->post('alamat_apartment'),
									'harga_apartment'	=>	$this->input->post('harga_apartment'),
									'deskripsi_apartment'	=>	$this->input->post('deskripsi_apartment'),
									'status_apartment'	=>	'Tersedia',
									'foto1'				=>	$upload_foto1['file_name'],
									'foto2'				=>	$upload_foto2['file_name'],
									'foto3'				=>	$upload_foto3['file_name'],
									'foto4'				=>	$upload_foto4['file_name']
								];

								$data2 = [
									'luas_apartment'	=>	$this->input->post('luas_apartment'),
									'listrik_apartment'	=>	$this->input->post('listrik_apartment'),
									'sertifikat_apartment'	=>	$this->input->post('sertifikat_apartment'),
									'tahundibuat_apartment'	=>	$this->input->post('tahundibuat_apartment'),
									'tipe_apartment'	=> 'Sewa'
								];

								$this->db->insert('tb_apartment',$data1);
								$this->db->insert('tb_detail_apartment',$data2);

								$this->session->set_flashdata('pesan','<div class="alert alert-success">
									Berhasil Menambah Data
								</div>');


							}

						}
					}
				}
		
	}

	public function update($id)
	{	

		$config['upload_path'] = './assets/image';
		$config['allowed_types'] = 'gif|png|jpg|pdf';
		$config['max_size'] = 0;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if (! $this->upload->do_upload('foto1')) {
					
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					Gagal mengupload foto 1! silahkan cek file upload!
				</div>');

				redirect('admin/apartment');

				}	else {

					$upload_foto1	=	$this->upload->data('');

					if (! $this->upload->do_upload('foto2')) {
						
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
							Gagal mengupload foto 2! silahkan cek file upload!
						</div>');

						redirect('admin/apartment');

					} else {
						$upload_foto2	=	$this->upload->data('');

						if (! $this->upload->do_upload('foto3')) {
							
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
								Gagal mengupload foto 3! silahkan cek file upload!
							</div>');

							redirect('admin/apartment');

						} else {

							$upload_foto3	=	$this->upload->data('');

							if (! $this->upload->do_upload('foto4')) {
								
								$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
									Gagal mengupload foto 4! silahkan cek file upload!
								</div>');

								redirect('admin/apartment');

							} else {

								$upload_foto4	=	$this->upload->data('');

								$data1 = [
									'nama_apartment'	=>	$this->input->post('nama_apartment'),
									'alamat_apartment'	=>	$this->input->post('alamat_apartment'),
									'harga_apartment'	=>	$this->input->post('harga_apartment'),
									'deskripsi_apartment'	=>	$this->input->post('deskripsi_apartment'),
									'status_apartment'	=>	$this->input->post('status_apartment'),
									'foto1'				=>	$upload_foto1['file_name'],
									'foto2'				=>	$upload_foto2['file_name'],
									'foto3'				=>	$upload_foto3['file_name'],
									'foto4'				=>	$upload_foto4['file_name']
								];

								$data2 = [
									'luas_apartment'	=>	$this->input->post('luas_apartment'),
									'listrik_apartment'	=>	$this->input->post('listrik_apartment'),
									'sertifikat_apartment'	=>	$this->input->post('sertifikat_apartment'),
									'tahundibuat_apartment'	=>	$this->input->post('tahundibuat_apartment'),
									'tipe_apartment'	=> 'Sewa'
								];

								$this->db->where('tb_apartment.id_apartment',$id);
								$this->db->update('tb_apartment',$data1);
								$this->db->update('tb_detail_apartment',$data2);

								$this->session->set_flashdata('pesan','<div class="alert alert-success">
									Berhasil Menambah Data
								</div>');


							}

						}
					}
				}
		
	}

	public function delete($id)
	{
		$this->db->where('id_apartment',$id);
		$this->db->delete('tb_apartment');
	}



	public function kode(){
		  $this->db->select('RIGHT(detail_apartment.id_detail_apartment,2) as id_detail_apartment', FALSE);
		  $this->db->order_by('id_detail_apartment','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('detail_apartment');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->id_detail_apartment) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $tgl=date('my'); 
			  $urut = str_pad($kode, 0, "0", STR_PAD_LEFT);    /*4 ADALAH JUMLAH ANGKA NOL DIBELAKANG*/
			 /* $kodetampil = "IDP".$urut;*/  //format kode
			  return $urut;  
	}

}
