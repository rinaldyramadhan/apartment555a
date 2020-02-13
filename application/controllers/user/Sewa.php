<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

	private $template = 'templates/template';

	public function __construct()
	{
		parent::__construct();
	}

	public function index($page = 'user/sewa/form_sewa')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();

		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoin();

		$this->load->view($this->template,$data);
	}

	public function sewa($id='', $page = 'user/sewa/form_sewa')
	{
		/*Mencari email, dan mengambil data dalam satu baris dari database*/
		$data['admin'] = $this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
		$data['penyewa'] = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();
		$email = $this->db->get_where('penyewa',['email'=>$this->session->userdata('email')])->row_array();


		$cekId = $this->db->get_where('tb_apartment',['id_apartment'=>$id])->row_array();

		if ($this->session->userdata('role') == 'Penyewa' || $this->session->userdata('role') == 'Admin' ) {

			if (! $cekId) {
				redirect('user/dashboard');
			} else {

				$data['kontenDinamis']	=	$page;
				$apartment	=	$this->M_apartment;
				$sewa 		=	$this->M_sewa;

				$data['content'] = $apartment->getJoinById($id);

				$sewa->rules();

				if ($this->form_validation->run() == FALSE ) {
				
					$this->load->view($this->template,$data);
				} else {

					$sewa->save();

					$this->session->set_flashdata('pesan','<div class="alert alert-success">
							Berhasil, silahkan melakukan pembayaran, batas waktu pembayaran 1 minggu.
		     			</div>');

					$this->session->set_userdata($data3);


					redirect('user/transaksi',$id);
				}
			}


		} else {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger">
						Silahkan Login terlebih dahulu, untuk melakukan sewa ^_^
	     			</div>');

			redirect('');

		}

	}


	




	public function tambah($page = 'user/sewa/tambah_sewa')
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

	public function detail($id,$page = 'user/home/detail_apartment')
	{
		$data['kontenDinamis']	=	$page;
		$apartment	=	$this->M_apartment;

		$data['content'] = $apartment->getJoinById($id);
		$c = $this->db->get_where('tb_apartment',['id_apartment'=>$id])->row();

		/*var_dump($c);*/

		if ($c == '') {
			redirect('');
		} else {

			$this->load->view($this->template,$data);
		}
	}


}
