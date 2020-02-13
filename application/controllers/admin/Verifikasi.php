<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

	private $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') == 'Admin') {
			# code...
		} else {
			redirect('home');
		}
	}

	public function index($page = 'admin/verifikasi/v_verifikasi')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$verifikasi	=	$this->M_verifikasi;

		$data['content'] = $verifikasi->verifikasi();

		$this->load->view($this->template,$data);
	}

	public function update($id='',$id_sewa='', $page = 'admin/verifikasi/update_verifikasi')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$verifikasi	=	$this->M_verifikasi;

		$data['content'] = $verifikasi->getById($id)->row_array();

		$data['tagihan']		=		$this->db->get_where('sewa',['id_sewa'=>$id_sewa])->row_array();

		$this->load->view($this->template,$data);
	}

	public function proses_update($id_konfirmasi="",$id_sewa="",$id_apartment="")
	{
		$this->M_verifikasi->act_update($id_konfirmasi,$id_sewa, $id_apartment);

		redirect('admin/sewa');
	}

	public function detail($id='',$page = 'admin/verifikasi/detail_verifikasi')
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


}