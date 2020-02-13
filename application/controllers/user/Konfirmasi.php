<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

	private $template = 'templates/template';

	public function __construct()
	{
		parent::__construct();
	}

	public function index($id='', $page = 'user/konfirmasi/v_konfirmasi')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		$admin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		
		$data['kontenDinamis']	=	$page;

		$id_sewa = $this->input->post('id_sewa');
		$id_penyewa = $this->input->post('id_penyewa');

		$data['content'] =  $this->db->get_where('sewa',['id_sewa'=>$id_sewa])->row_array();
		
		$transaksi = $this->db->get_where('sewa',['id_sewa'=>$id_sewa])->row_array();

		$id_sewa = $this->input->post('id_sewa');
		$id_penyewa = $this->input->post('id_penyewa');


/*		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoin();*/

		/*cek user apakah ada didalam database*/
		if ($penyewa) {

			$this->form_validation->set_rules('id_sewa','Id Sewa', 'required|trim',[
				'required'	=>	'Perhatian, pastikan ID sewa terisi dengan benar'
			]);
			$this->form_validation->set_rules('no_rek','No Rek', 'required|trim',[
				'required'	=>	'Perhatian, pastikan No Rekening terisi dengan benar'
			]);
			$this->form_validation->set_rules('nama_account','Nama Account', 'required|trim',[
				'required'	=>	'Perhatian, Nama account tidak boleh kosong'
			]);
			$this->form_validation->set_rules('tgl_transfer','Id Sewa', 'required|trim',[
				'required'	=>	'Perhatian, Tanggal transfer tidak boleh kosong'
			]);

			/*SISTEM CEK ID sewa*/
			if ($transaksi) {

				if ($transaksi['status_sewa'] != 'Lunas') {

					if ($this->form_validation->run() == false) {

						$this->load->view($this->template,$data);
				
					} else {
						
						/*cek id sewa dengan id sewa yang di input*/
						$transaksi = $this->db->get_where('sewa',['id_sewa'=>$id_sewa])->row_array();
						$cekKonfirmasi = $this->db->get_where('konfirmasi',['id_sewa'=>$id_sewa])->row_array();

							
							
							if ($id_penyewa == $transaksi['id_penyewa']) {
								
								/*jika id sewa  yang diinput ada pada table konfirmasi*/
								if ($cekKonfirmasi) {

									$config['upload_path'] = './assets/image/konfirmasi';
									$config['allowed_types'] = 'gif|png|jpg|pdf';
									$config['max_size'] = 0;
									$this->load->library('upload',$config);
									$this->upload->initialize($config);

									if (! $this->upload->do_upload('foto')) {
												
											$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
												Gagal mengupload foto! silahkan cek file upload!
											</div>');

											redirect('user/konfirmasi');

											}	else {
												$upload_foto	=	$this->upload->data('');

												$total_bayar	=	$this->input->post('total_bayar');

												/* data untuk diupdate pada tabe konfirmasi */
												$dataKonfirm = [
													'id_sewa'	=> $this->input->post('id_sewa'),
													'no_rekening'	=> $this->input->post('no_rek'),
													'nama_account'	=> $this->input->post('nama_account'),
													'tgl_transfer'	=> $this->input->post('tgl_transfer'),
													'status_konfirmasi'	=> 'Menunggu Verifikasi Admin',
													'nominal_bayar'	=> $total_bayar,
													'foto'	=> $upload_foto['file_name']

												];

												/* data untuk diupdate pada table sewa*/
												$dataSewa = [
													'status_sewa'	=> 'Menunggu Verifikasi Admin',
													'payment'	=> $this->input->post('payment')

												];

													$this->session->set_flashdata('pesan','<div class="alert alert-success">
														Berhasil Melakukan Konfirmasi Pembayaran
													</div>');

												$this->db->where('id_sewa',$id_sewa);
												$this->db->update('konfirmasi',$dataKonfirm);
												$this->db->where('id_sewa',$id_sewa);
												$this->db->update('sewa',$dataSewa);

												redirect('user/riwayatsewa');

											}
									

									/* jika id sewa tidak ada di table konfirmasi*/
								} else {

									$config['upload_path'] = './assets/image/konfirmasi';
									$config['allowed_types'] = 'gif|png|jpg|pdf';
									$config['max_size'] = 0;
									$this->load->library('upload',$config);
									$this->upload->initialize($config);

									if (! $this->upload->do_upload('foto')) {
												
											$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
												Gagal mengupload foto! silahkan cek file upload!
											</div>');

											redirect('konfirmasi');

											}	else {
												$upload_foto	=	$this->upload->data('');

												$total_bayar	=	$this->input->post('total_bayar');

												/* data untuk diupdate pada tabe konfirmasi */
												$dataKonfirm = [
													'id_sewa'	=> $this->input->post('id_sewa'),
													'no_rekening'	=> $this->input->post('no_rek'),
													'nama_account'	=> $this->input->post('nama_account'),
													'tgl_transfer'	=> $this->input->post('tgl_transfer'),
													'status_konfirmasi'	=> 'Menunggu Verifikasi Admin',
													'nominal_bayar'	=> $total_bayar,
													'foto'	=> $upload_foto['file_name']

												];

												/* data untuk diupdate pada table sewa*/
												$dataSewa = [
													'status_sewa'	=> 'Menunggu Verifikasi Admin',
													'payment'	=> $this->input->post('payment')

												];

													$this->session->set_flashdata('pesan','<div class="alert alert-success">
														Berhasil Melakukan Konfirmasi Pembayaran
													</div>');

												$this->db->insert('konfirmasi',$dataKonfirm);
												$this->db->where('id_sewa',$id_sewa);
												$this->db->update('sewa',$dataSewa);

												redirect('user/riwayatsewa');

											}
								}
							} else {
								$this->session->set_flashdata('pesan','<div class="alert alert-danger">
									Tidak dapat menemukan ID Sewa sesuai riwayat sewa anda
								</div>');

								redirect('user/riwayatsewa');
							}

					}

				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">
						ID Sewa  sudah melunasi pembayaran
					</div>');


					redirect('user/riwayatsewa');
				}

			} else {

				$this->session->set_flashdata('pesan_form','<small class="text-danger">
					Masukan ID Sewa anda
				</small>');
				
				$this->load->view($this->template,$data);
				

			}

		} else {

			/* Pesan cek user jika email tidak terdaftar*/
			$this->session->sess_destroy();
			redirect('');
		}
	}


}