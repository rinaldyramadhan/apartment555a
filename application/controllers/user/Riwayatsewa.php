<?php
	class Riwayatsewa extends CI_Controller{

	private $template = 'templates/template';

	public function __construct()
	{
		parent::__construct();
	}

	public function index($page = 'user/riwayatsewa/v_riwayatsewa')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		$admin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$riwayatsewa	=	$this->M_riwayatsewa;

		$data['content'] = $riwayatsewa->get();

		
		/*cek user apakah ada didalam database*/
		if ($penyewa || $admin ) {
			$this->load->view($this->template,$data);
		} else {

			/* Pesan cek user jika email tidak terdaftar*/
			$this->session->sess_destroy();
			redirect('');
		}
	}

	public function detail($id='', $page = 'user/riwayatsewa/detail_riwayatsewa')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		$admin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$riwayatsewa	=	$this->M_riwayatsewa;

		$data['content'] = $riwayatsewa->getDetail($id);

		$data['total']	=	$riwayatsewa->getTotalById($id);
		$data['totalDP']	=	$riwayatsewa->getTotalDPById($id);

		
		/*cek user apakah ada didalam database*/
		if ($penyewa || $admin ) {
			$this->load->view($this->template,$data);
		} else {

			/* Pesan cek user jika email tidak terdaftar*/
			$this->session->sess_destroy();
			redirect('');
		}
	}




	public function invoice($id='',$page = 'user/riwayatsewa/invoice_sewa')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$admin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$transaksi	=	$this->M_transaksi;
		$sewa	=	$this->M_sewa;
		$verifikasi	=	$this->M_verifikasi;

		$data['content'] = $verifikasi->getJoinById($id);
		$data['invoice'] = $verifikasi->getJoinById($id)->row_array();


		$data['total'] = $sewa->getTotal2($id);
		$data['totalDP'] = $sewa->getTotalDP($id);


			
			$this->load->view($this->template,$data);

	}


	public function cetak($id)
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



}
?>