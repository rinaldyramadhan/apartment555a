<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	private $template = 'templates/template';

	public function __construct()
	{
		parent::__construct();
	}

	public function index($page =	'user/transaksi/transaksi')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$admin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$transaksi	=	$this->M_transaksi;

		$data['content'] = $transaksi->getTransaksi();

		$data['total'] = $transaksi->getTotal();
		$data['totalDP'] = $transaksi->getTotalDP();


		$ses_id_sewa = $this->session->userdata('id_sewa');

		if ($penyewa || $admin) {

			/*mengupdate tabel sewa , kolom jumlah total*/
			$jumlah_total = $transaksi->getTotal();

			$data1 = [

					'jumlah_total'		=> $jumlah_total
			];


			$this->db->where('id_sewa', $ses_id_sewa);
			$this->db->update('sewa', $data1);

			if ($ses_id_sewa) {
				$this->load->view($this->template,$data);
			} else {
				redirect('user');
			}
		} else {
			$this->session->sess_destroy();
			redirect('');
		}
	}


	public function selesai($id)
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database untuk memanggil data ke view*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		/*untuk dipakai controller, cek email ada atau tidak dalam database */
		$admin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$transaksi	=	$this->M_transaksi;

		$data['content'] = $transaksi->getTransaksi2($id);

		$data['id_sewa']	=	$id;

		/* menghitung total dari id sewa*/
		$data['total'] = $transaksi->getTotal2($id);
		$data['totalDP'] = $transaksi->getTotalDPbyId($id);



		/* cek keberadaan email didalam database jika ada masuk*/
		if ($penyewa == true || $admin == true) {


			/*$ses_id_sewa = $this->session->userdata('id_sewa');	*/
			/* Cek id sewa dari session*/
			/*if ($ses_id_sewa) {*/
				
				$this->load->view('user/transaksi/selesai',$data);

				$this->session->unset_userdata('id_sewa');
				$this->session->unset_userdata('payment');



/*
			} else {

				$this->session->set_flashdata('pesan','<div class="alert alert-danger">
					Tidak menemukan Kode Sewa.
				</div>');
				redirect('');
			}*/
		

			/*jika email tidak terdaftar, di destroy dan ke halaman utama*/
		} else {
			$this->session->sess_destroy();
			redirect('');
		}
	}

	public function batal($id)
	{
		$this->M_transaksi->batal($id);
	}

	public function batalById($id_apartment)
	{
		$this->M_transaksi->batalById($id_apartment);
	}

}