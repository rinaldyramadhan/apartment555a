<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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

	public function index($page = 'admin/laporan/v_laporan')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$sewa	=	$this->M_sewa;

		$data['jumlahTotalHarga'] = $sewa->getTotalHargaByTgl();
		$data['content'] = $sewa->getByTgl();
		

		$this->load->view($this->template,$data);
	}

	public function tampil($page = 'admin/laporan/tampil_laporan')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$sewa	=	$this->M_sewa;

		$data['jumlahTotalHarga'] = $sewa->getTotalHargaByTgl();
		$data['content'] = $sewa->getByTgl();



		$this->load->view($this->template,$data);

	}

	public function cetak()
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$sewa	=	$this->M_sewa;

		$data['jumlahTotalHarga'] = $sewa->getTotalHargaByTgl();
		
			
		$data['content'] = $sewa->getByTgl();

		$this->load->view('admin/laporan/cetak_laporan',$data);
	}

}