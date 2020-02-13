<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {


	public function __construct()
	{
		parent::__construct();

	}

	public function rules(){

		
		$this->form_validation->set_rules('nama','Nama', 'required|trim|min_length[3]',[
			'required'	=>	'Nama lengkap tidak boleh kosong',
			'min_length'	=>	'Nama lengkap minimal 3 Karakter'
		]);
		$this->form_validation->set_rules('no_hp','no_hp', 'required|trim|min_length[13]|numeric',[
			'required'	=>	'Nomor HP / Telpon tidak boleh kosong',
			'min_length'	=>	'Nomor HP / Telpon minimal 13 Karakter',
			'numeric'	=>	'Nomor HP / Telpon hanya boleh dengan angka'
		]);
		$this->form_validation->set_rules('alamat','Alamat', 'required|trim|min_length[3]',[
			'required'	=>	'Alamat tidak boleh kosong'
		]);
		
		$this->form_validation->set_rules('password','Password', 'required|trim|min_length[3]|matches[konfirmasi_password]',[
			'required'	=>	'Password tidak boleh kosong',
			'matches'	=>	'Password tidak sama silahkan cek lagi'
		]);
		$this->form_validation->set_rules('konfirmasi_password','Password', 'required|trim|min_length[3]',[
			'required'	=>	'Konfirmasi password tidak boleh kosong'
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

	public function getJoinByEmail($email)
	{
		$email = $this->session->userdata('email');
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->join('penyewa','penyewa.email=admin.email');
		$this->db->where('admin.email',$email);
		return $this->db->get()->row_array();

	}

	public function getById($id,$table)
	{
		return $this->db->get_where($table,['id_apartment'=>$id]);
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

	public function act_edit($id)
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$password = $this->input->post('password');

		$config['upload_path'] = './assets/image/profil';
		$config['allowed_types'] = 'gif|png|jpg|pdf';
		$config['max_size'] = 0;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if (! $this->upload->do_upload('foto_profil')) {
					
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
					Gagal mengupload foto! silahkan cek file upload!
				</div>');

				redirect('user/dashboard');

				}	else {

					$upload_foto	=	$this->upload->data('');

				$data = [
					'nama'	=>	$nama,
					'foto_profil'	=>	$upload_foto['file_name'],
					'no_hp'			=>	$no_hp,
					'alamat'			=>	$alamat,
					'password'		=>	password_hash($password,PASSWORD_DEFAULT),
					'role'			=> 'Penyewa'
				];

				$this->db->where('id_penyewa', $id);
				$this->db->update('penyewa', $data);
		}

	}


}
