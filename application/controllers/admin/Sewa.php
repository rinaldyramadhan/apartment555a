<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

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

	public function index($page = 'admin/sewa/hal_sewa')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$sewa	=	$this->M_sewa;

		$data['content'] = $sewa->get2();

		$this->load->view($this->template,$data);
	}


	public function tambah($page = 'admin/apartment/tambah_apartment')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		
		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoin();

		$apartment->rules();

		if ($this->form_validation->run() == false ) {
			
			$this->load->view($this->template,$data);

		} else {

			$this->session->set_flashdata('pesan','<div class="alert alert-success">
				Berhasil menambahkan data
			</div>');

			$apartment->save();

			redirect('admin/apartment');
		}
	}


	public function delete($id)
	{
			$this->db->where('id_sewa',$id);
			$this->db->delete('detail_sewa');
			$this->db->where('id_sewa',$id);
			$this->db->delete('sewa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
			 Data berhasil dihapus semua
			</div>');

			redirect('admin/sewa');
	}


	public function delete_all()
	{
			$this->db->truncate('sewa');
			$this->db->truncate('detail_sewa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
			 Data berhasil dihapus semua
			</div>');

			redirect('admin/sewa');
	}

	public function detail($id='',$page = 'admin/sewa/detail_sewaAdm')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$admin = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$penyewa = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$transaksi	=	$this->M_transaksi;
		$sewa	=	$this->M_sewa;

		$data['content'] = $sewa->getJoinById($id);

		$data['total'] = $sewa->getTotal2($id);
		$data['totalDP'] = $sewa->getTotalDP($id);


			
			$this->load->view($this->template,$data);

	}

	public function invoice($id='',$page = 'admin/sewa/invoice_sewa')
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